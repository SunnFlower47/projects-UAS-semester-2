<?php

namespace App\Filament\Resources;

use App\Models\Denda;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\DendaResource\Pages;

class DendaResource extends Resource
{
    protected static ?string $model = Denda::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Manajemen Denda';
    protected static ?string $navigationGroup = 'Manajemen Perpustakaan';
    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->with('pinjaman');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Toggle::make('sudah_dibayar')->label('Sudah Dibayar'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('pinjaman.kode_transaksi')
                    ->label('Kode Transaksi')
                    ->getStateUsing(fn ($record) => optional($record->pinjaman)->kode_transaksi ?? '-')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pinjaman.user.name')
                    ->label('Peminjam')
                    ->getStateUsing(fn ($record) => optional($record->pinjaman)->user->name ?? '-')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pinjaman.book.judul')
                    ->label('Buku')
                    ->getStateUsing(fn ($record) => optional($record->pinjaman)->book->judul ?? '-')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->money('IDR')
                    ->label('Jumlah Denda')
                    ->sortable(),
                Tables\Columns\TextColumn::make('sudah_dibayar')
                    ->label('Status Pembayaran')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Lunas' : 'Belum Dibayar')
                    ->color(fn ($state) => $state ? 'success' : 'danger'),
                Tables\Columns\TextColumn::make('pinjaman.tanggal_kembali')
                    ->label('Tanggal Kembali')
                    ->getStateUsing(fn ($record) => optional($record->pinjaman)->tanggal_kembali ?? '-')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('sudah_dibayar')
                    ->label('Status Pembayaran')
                    ->options([
                        true => 'Lunas',
                        false => 'Belum Dibayar',
                    ]),
            ])
            ->actions([
                Action::make('tandaiLunas')
                    ->label('Tandai Lunas')
                    ->visible(fn ($record) => !$record->sudah_dibayar)
                    ->action(fn ($record) => $record->update(['sudah_dibayar' => true]))
                    ->requiresConfirmation()
                    ->color('success')
                    ->successNotificationTitle('Denda berhasil ditandai lunas'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDendas::route('/'),
            'edit' => Pages\EditDenda::route('/{record}/edit'),
        ];
    }
}
