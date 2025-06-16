<?php

namespace App\Filament\Resources\BooksResource\Pages;

use App\Filament\Resources\BooksResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class EditBooks extends EditRecord
{
    protected static string $resource = BooksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')->label('Judul Buku')->required(),
                TextInput::make('genre')->label('Genre')->nullable(),
                TextInput::make('pengarang')->label('Pengarang')->required(),
                TextInput::make('penerbit')->label('Penerbit')->required(),
                TextInput::make('tahun')->label('Tahun Terbit')->numeric()->required(),
                TextInput::make('tempat_terbit')->label('Tempat Terbit')->nullable(),
                TextInput::make('isbn')->label('ISBN')->unique(ignoreRecord: true)->nullable(),
                TextInput::make('jumlah_halaman')->label('Jumlah Halaman')->numeric()->nullable(),
                TextInput::make('lokasi_rak')->label('Lokasi Rak')->nullable(),
                TextInput::make('bahasa')->label('Bahasa')->default('indonesia')->required(),
                TextInput::make('stok')->label('Stok Buku')->numeric()->required(),
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

                Textarea::make('deskripsi')->label('Deskripsi Buku')->nullable(),
            ]);
    }
}
