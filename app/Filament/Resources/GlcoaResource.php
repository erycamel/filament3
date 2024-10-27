<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GlcoaResource\Pages;
use App\Filament\Resources\GlcoaResource\RelationManagers;
use Filament\Forms\Components\TextInput;
use App\Models\Glcoa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GlcoaResource extends Resource
{
    protected static ?string $model = Glcoa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Chart Of Account';
    protected static ?string $pluralModelLabel = 'Chart Of Account';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('noper')->label('No. Perkiraan.')->required(),
                TextInput::make('naper')->label('Nama Perkiraan.')->required(),
                TextInput::make('gnoper')->label('Induk No. Perkiraan.')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('noper')->label('No. Perkiraan.'),
                TextColumn::make('naper')->label('Nama Perkiraan.'),
                TextColumn::make('gnoper')->label('Induk No. Perkiraan.'),
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
            'index' => Pages\ListGlcoas::route('/'),
            'create' => Pages\CreateGlcoa::route('/create'),
            'edit' => Pages\EditGlcoa::route('/{record}/edit'),
        ];
    }
}
