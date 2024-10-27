<?php

namespace App\Filament\Resources\GlcoaResource\Pages;

use App\Filament\Resources\GlcoaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGlcoa extends EditRecord
{
    protected static string $resource = GlcoaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
