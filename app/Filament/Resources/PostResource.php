<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Post';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Post Details')
            ->description('All fields are required.')
            ->collapsible()
            ->schema([
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('slug')->required()->maxLength(255),
                Select::make('category_id')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->label('Category'),
                ColorPicker::make('color')->required(),
                MarkdownEditor::make('content')->columnSpanFull(),                
            ])->columns(2),
            FileUpload::make('thumbnail')
                ->label('Thumbnail')->image()
                ->disk('public')
                ->directory('thumbnails'),
            TagsInput::make('tags')->columnSpanFull(),
            Toggle::make('published')->required(),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('slug')->searchable(),
                ColorColumn::make('color')->searchable(),
                TextColumn::make('category.name')->numeric()->sortable(),
                CheckboxColumn::make('published'),
                ImageColumn::make('thumbnail')->searchable(),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true)])
            ->filters([
                //
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
