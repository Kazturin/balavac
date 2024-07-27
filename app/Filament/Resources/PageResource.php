<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Menu;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Контент';

    protected static ?string $navigationLabel = 'Страницы';

    protected static ?string $modelLabel = 'Страницы';

    protected static ?string $pluralModelLabel = 'Страницы';

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user->hasRole('Manager') || $user->hasRole('Admin');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make()
                ->schema([
                    Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('kz')
                        ->schema([
                            Forms\Components\TextInput::make('title_kk')
                            ->required()
                            ->maxLength(255)
                            ->reactive()
                            ->debounce(500)
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                            $set('slug', Str::slug($state));
                               }),
                            TiptapEditor::make('content_kk')
                               ->required()
                               ->directory(auth()->user()->id.'/pages')
                               ->columnSpanFull(),
                        ]),
                        Tabs\Tab::make('ru')
                        ->schema([
                            Forms\Components\TextInput::make('title_ru')
                            ->required()
                            ->maxLength(255),
                        TiptapEditor::make('content_ru')
                                   ->required()
                                   ->directory(auth()->user()->id.'/pages')
                                   ->columnSpanFull(),
                        ])
                    ]),
               
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('meta_title')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')
                        ->maxLength(255),
                    Forms\Components\Select::make('parent_id')
                        ->options(Page::all()->pluck('title_kk', 'id')),
                    Forms\Components\DateTimePicker::make('published_at'),
                    Forms\Components\Toggle::make('active')
                        ->default(1),
                ])->columnSpan(8),

            Forms\Components\Section::make()
                ->schema([
                    Forms\Components\FileUpload::make('thumbnail'),
                    Forms\Components\Select::make('menu_id')
                    ->options(Menu::all()->pluck('title_ru', 'id')),
                ])->columnSpan(4)
        ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title_kk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('menu.title_kk'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
