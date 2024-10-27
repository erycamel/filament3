<?php

namespace App\Filament\Resources\GlcoaResource\Pages;

use App\Filament\Resources\GlcoaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGlcoas extends ListRecords
{
    protected static string $resource = GlcoaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
