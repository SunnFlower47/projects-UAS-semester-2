<?php

namespace App\Filament\Resources\BooksResource\Pages;

use App\Filament\Resources\BooksResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use App\Models\Book;
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
            TextInput::make('isbn')
                ->label('ISBN')
                ->unique()
                ->nullable(),
            TextInput::make('jumlah_halaman')
                ->label('Jumlah Halaman')
                ->numeric()
                ->nullable(),
            TextInput::make('lokasi_rak')
                ->label('Lokasi Rak')
                ->nullable(),
            TextInput::make('bahasa')
                ->label('Bahasa')
                ->default('indonesia')
                ->required(),
            TextInput::make('stok')
                ->label('Stok Buku')
                ->numeric()
                ->required(),
            Select::make('kategori_id')
                ->label('Kategori')
                ->relationship('kategori', 'nama')
                ->required(),
            FileUpload::make('cover')
                ->label('Cover Buku')
                ->directory('images/covers')
                ->visibility('public')
                ->disk('public')
                ->preserveFilenames()
                ->nullable(),

            Textarea::make('deskripsi')
                ->label('Deskripsi Buku')
                ->nullable(),
        ]);
}
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
