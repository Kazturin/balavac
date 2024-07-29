<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\PostCategory;
use Closure;
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

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Контент';

    protected static ?string $navigationLabel = 'Статьи';

    protected static ?string $modelLabel = 'Статья';

    protected static ?string $pluralModelLabel = 'Статьи';

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
                                   ->directory(auth()->user()->id.'/posts')
                                   ->columnSpanFull(),
                            ]),
                            Tabs\Tab::make('ru')
                            ->schema([
                                Forms\Components\TextInput::make('title_ru')
                                ->required()
                                ->maxLength(255),
                            TiptapEditor::make('content_ru')
                                       ->required()
                                       ->directory(auth()->user()->id.'/posts')
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
                        Forms\Components\Select::make('category_id')
                        ->options(PostCategory::all()->pluck('title_kk', 'id')),
                    ])->columnSpan(4)
            ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('title_kk')
                ->searchable()
                ->sortable(),
                Tables\Columns\IconColumn::make('active')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('category.title_kk'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
