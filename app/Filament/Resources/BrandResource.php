<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 0;
    protected static ?string $navigationGroup = 'Shop';
    protected static ?string $navigationLabel = 'Brand';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Entry Brand')->schema([
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
                            ->disabled()
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
                    ])->columns(2)
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Status')
                        ->schema([
                            Forms\Components\Checkbox::make('is_visible')
                                ->label('Visibility')
                                ->helperText('Enable or disable brand visibility')
                                ->default(true),
                        ]),
                    Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\Section::make('Color')
                                ->schema([
                                    Forms\Components\ColorPicker::make('primary_hex')
                                        ->label('Primary Color')
                                ])
                        ])
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('Website URL')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ColorColumn::make('primary_hex')
                    ->label('Primary Color'),
                Tables\Columns\IconColumn::make('is_visible')
                    ->sortable()
                    ->label('Visibility')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->date(),
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
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
