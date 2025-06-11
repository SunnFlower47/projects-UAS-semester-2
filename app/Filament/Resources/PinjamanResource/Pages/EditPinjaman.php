<?php

namespace App\Filament\Resources\PinjamanResource\Pages;

use App\Filament\Resources\PinjamanResource;
use App\Models\Book;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\EditRecord;

class EditPinjaman extends EditRecord
{
    protected static string $resource = PinjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $originalStatus = $this->record->status;
        $newStatus = $data['status'];

        if ($originalStatus !== 'dikembalikan' && $newStatus === 'dikembalikan') {
            $book = Book::find($this->record->book_id);
            if ($book) {
                $book->increment('stok');
            }
        }

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('book_id')
                    ->label('Pilih Buku')
                    ->relationship('book', 'judul')
                    ->disabled()
                    ->required(),

                DatePicker::make('tanggal_pinjam')
                    ->label('Tanggal Pinjam')
                    ->required(),

                DatePicker::make('tanggal_kembali')
                    ->label('Target Kembali')
                    ->required(),

                DatePicker::make('tanggal_kembali_asli')
                    ->label('Tanggal Kembali Asli')
                    ->hint('Isi jika buku benar-benar sudah dikembalikan')
                    ->required(fn ($get) => $get('status') === 'dikembalikan'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'dipinjam' => 'Dipinjam',
                        'dikembalikan' => 'Dikembalikan',
                        'terlambat' => 'Terlambat',
                    ])
                    ->required(),
            ]);
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
