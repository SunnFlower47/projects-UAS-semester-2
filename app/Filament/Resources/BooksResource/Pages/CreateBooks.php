<?php

namespace App\Filament\Resources\BooksResource\Pages;

use App\Filament\Resources\BooksResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBooks extends CreateRecord
{
    protected static string $resource = BooksResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
