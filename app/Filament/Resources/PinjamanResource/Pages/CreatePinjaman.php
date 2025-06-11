<?php

namespace App\Filament\Resources\PinjamanResource\Pages;

use App\Filament\Resources\PinjamanResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class CreatePinjaman extends CreateRecord
{
    protected static string $resource = PinjamanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        $book = Book::find($data['book_id']);
        if ($book && $book->stok > 0) {
            $book->decrement('stok');
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
                    ->searchable()
                    ->required(),

                DatePicker::make('tanggal_pinjam')
                    ->label('Tanggal Pinjam')
                    ->default(today())
                    ->required(),

                DatePicker::make('tanggal_kembali')
                    ->label('Tanggal Kembali')
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'dipinjam' => 'Dipinjam',
                        'dikembalikan' => 'Dikembalikan',
                        'terlambat' => 'Terlambat',
                    ])
                    ->default('dipinjam')
                    ->required(),
            ]);
    }
}
