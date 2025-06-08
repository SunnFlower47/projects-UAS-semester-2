<?php

namespace App\Filament\Resources\BooksResource\Pages;

use App\Filament\Resources\BooksResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class CreateBooks extends CreateRecord
{
    protected static string $resource = BooksResource::class;

    public function form(Form $form): Form
    {
    return $form
        ->schema([
            TextInput::make('judul')
                ->label('Judul Buku')
                ->required(),

            TextInput::make('pengarang')
                ->label('Pengarang')
                ->required(),

            TextInput::make('penerbit')
                ->label('Penerbit')
                ->required(),

            TextInput::make('tahun')
                ->label('Tahun Terbit')
                ->numeric()
                ->required(),

            TextInput::make('stok')
                ->label('Stok Buku')
                ->numeric()
                ->required(),

            Select::make('kategori_id')
                ->label('Kategori')
                ->relationship('kategori', 'nama')
                ->required(),
        ]);
}
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
