<?php

namespace App\Filament\Resources\DendaResource\Pages;

use App\Filament\Resources\DendaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDenda extends EditRecord
{
    protected static string $resource = DendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
