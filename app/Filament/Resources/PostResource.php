<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Filament\Resources\PostResource\Pages\EditPost;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Blog';
    protected static ?int $navigationSort = 1;
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
                    // ->options(Category::all()->pluck('name', 'id'))
                    ->relationship('category', 'name')
                    ->searchable()
                    ->label('Category')->required(),
                ColorPicker::make('color')->required(),
                MarkdownEditor::make('content')->columnSpanFull(),                
            ])->columnSpan(2)->columns(2),
            Group::make()->schema([
                Section::make("image")
                ->collapsible()
                ->schema([
                    FileUpload::make('thumbnail')
                        ->label('Thumbnail')->image()
                        ->disk('public')
                        ->directory('thumbnails'),
                        ])->columnSpan(1),
                Section::make("meta")->schema([
                    TagsInput::make('tags')->columnSpanFull(),
                    Toggle::make('published')->required(),
                    ])->columnSpan(1),
            ])
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('title')->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('slug')->searchable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ColorColumn::make('color')->searchable()->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('category.name')->numeric()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\CheckboxColumn::make('published')->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('thumbnail')->searchable()->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Published On')
                    ->date()
                    ->sortable()->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable()])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                ])
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
