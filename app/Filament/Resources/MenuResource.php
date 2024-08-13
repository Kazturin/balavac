<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\MenuCategory;
use App\Models\Menu;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Меню';

    protected static ?string $modelLabel = 'Меню';

    protected static ?string $pluralModelLabel = 'Меню';

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user->hasRole('Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title_kk')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                Forms\Components\TextInput::make('title_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('parent_id')
                    ->options(Menu::where('parent_id',NULL)->pluck('title_kk', 'id')),    
                Forms\Components\TextInput::make('link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sort')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Select::make('category_id')
                    ->required()
                    ->options(MenuCategory::all()->pluck('title', 'id')),
                Forms\Components\Toggle::make('active')
                    ->default(1),
                Forms\Components\Toggle::make('vaccination_route')
                    ->default(0)
                    ->label('Маршрут вакцинации'), 
                ]),
                Section::make('Контент')
                    ->relationship('page',condition: fn (?array $state): bool => filled($state['title_kk']))
                ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('kz')
                        ->schema([
                            Forms\Components\TextInput::make('title_kk')
                            ->maxLength(255)
                            ->reactive()
                            ->debounce(500)
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                            $set('slug', Str::slug($state));
                               }),
                            TiptapEditor::make('content_kk')
                               ->requiredWith('title_kk')
                               ->directory(auth()->user()->id.'/pages')
                               ->columnSpanFull(),
                        ]),
                        Tabs\Tab::make('ru')
                        ->schema([
                            Forms\Components\TextInput::make('title_ru')
                            ->requiredWith('title_kk')
                            ->maxLength(255),
                        TiptapEditor::make('content_ru')
                                   ->requiredWith('title_kk')
                                   ->directory(auth()->user()->id.'/pages')
                                   ->columnSpanFull(),
                        ])
                    ]),
               
                    Forms\Components\TextInput::make('slug')
                        ->requiredWith('title_kk')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('meta_title')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')
                        ->maxLength(255),
                    Forms\Components\Select::make('parent_id')
                        ->options(Page::all()->pluck('title_kk', 'id')),
                    Forms\Components\Toggle::make('active')
                        ->default(1),
                   
            ])    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ru')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.title_kk')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sort')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenu::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
