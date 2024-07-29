<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Контент';

    protected static ?string $navigationLabel = 'Новости';

    protected static ?string $modelLabel = 'Новости';

    protected static ?string $pluralModelLabel = 'Новости';

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
                                   ->directory(auth()->user()->id.'/news')
                                   ->columnSpanFull(),
                            ]),
                            Tabs\Tab::make('ru')
                            ->schema([
                                Forms\Components\TextInput::make('title_ru')
                                ->required()
                                ->maxLength(255),
                            TiptapEditor::make('content_ru')
                                       ->required()
                                       ->directory(auth()->user()->id.'/news')
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
                        Forms\Components\Toggle::make('active')
                            ->default(1),
                        Forms\Components\DateTimePicker::make('published_at'),
                    ])->columnSpan(8),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\FileUpload::make('thumbnail')
                        ->image(),
                    ])->columnSpan(4)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title')->searchable(['title', 'content'])->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->sortable()
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
