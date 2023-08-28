<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Enums\ProductTypeEnum;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Brand;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Shop';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Products';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Entry Product')->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->unique(Product::class, 'name', ignoreRecord: true)
                        ->afterStateUpdated(function(string $operation, $state, Forms\set $set){
                            if ($operation !== 'create') {
                                return;
                            }
                            $set('slug', Str::slug($state));
                        }),
                    Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required()
                        ->unique(Product::class, 'slug', ignoreRecord: true),
                    Forms\Components\RichEditor::make('description')->columnSpanFull(),
                ])->columns(2),

                Forms\Components\Section::make('Pricing & Inventory')->schema([
                    Forms\Components\TextInput::make('sku')
                        ->label("SKU (Stock Keeping Unit)")
                        ->unique()
                        ->required(),
                    Forms\Components\TextInput::make('price')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('quantity')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(100),
                    Forms\Components\Select::make('type')->options([
                        'downloadable' => ProductTypeEnum::DOWNLOADABLE->value,
                        'deliverable' => ProductTypeEnum::DELIVERABLE->value,
                    ])->required()
                ])->columns(2), // End Section 1.2 Schema
            ]), // End Group Schema

            Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Status')->schema([
                    Forms\Components\Checkbox::make('is_visible')
                        ->label('Visibility')
                        ->helperText('Enable or disable product visibility')
                        ->default(true),
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Featured')
                        ->helperText('Enable or disable product featured status'),
                    Forms\Components\DatePicker::make('published_at')
                        ->label('Availablity Date')
                        ->default(now())
                ]),
                // End Section 2.1 Schema
                Forms\Components\Section::make('Image')->schema([
                    Forms\Components\FileUpload::make('image')
                    ->label('Image')
                    ->directory('form-attachments')
                    ->preserveFilenames()
                    ->image()
                    ->imageEditor(),
                ])->collapsible(),
                Forms\Components\Section::make('Associations')->schema([
                    Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                        ->required()
                        ->live(onBlur: true)
                        ->unique(Brand::class, 'name', ignoreRecord: true)
                        ->afterStateUpdated(function(string $operation, $state, Forms\set $set){
                            if ($operation !== 'create') {
                                return;
                            }
                            $set('slug', Str::slug($state));
                        }),
                        Forms\Components\TextInput::make('slug')
                            // ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(),
                        Forms\Components\TextInput::make('url')
                            ->label('Website URL')
                            ->required()
                            ->unique()
                            ->columnSpan('full'),
                        Forms\Components\MarkdownEditor::make('description')
                            ->columnSpan('full')
                    ])
                    ->native(false),
                ])->collapsible(),
                // End Section 2.2 Schema
            ]),
            // End Group Schema
        ]);
        // End Schema
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('brand.name')
                ->searchable()
                ->sortable()
                ->toggleable(),
            Tables\Columns\IconColumn::make('is_visble')
                ->searchable()
                ->sortable()
                ->toggleable()
                ->label('Visibility')
                ->boolean(),
            Tables\Columns\TextColumn::make('price')
                ->sortable()
                ->money()
                ->toggleable(),
            Tables\Columns\TextColumn::make('quantity')
                ->sortable()
                ->toggleable(),
            Tables\Columns\TextColumn::make('published_at')
                ->sortable()
                ->date(),
            Tables\Columns\TextColumn::make('type'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime('M d Y h:i A')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime('M d Y h:i A')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->filters([
            Tables\Filters\TernaryFilter::make('is_visible')
                ->label('visibilty')
                ->boolean()
                ->trueLabel('Only Visible Produtcs')
                ->falseLabel('Only Hidden Produtcs')
                ->native(false),
            Tables\Filters\SelectFilter::make('brand')
                ->relationship('brand', 'name')
        ])
        ->actions([Tables\Actions\EditAction::make()])
        ->bulkActions([Tables\Actions\BulkActionGroup::make([
            Tables\Actions\DeleteBulkAction::make()])
        ])
        ->emptyStateActions([
            Tables\Actions\CreateAction::make()
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
