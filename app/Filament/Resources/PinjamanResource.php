<?php

namespace App\Filament\Resources;

use App\Models\Pinjaman;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\PinjamanResource\Pages;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\DatePicker;
use App\Exports\PinjamanExport;
use Maatwebsite\Excel\Facades\Excel;

class PinjamanResource extends Resource
{
    protected static ?string $model = Pinjaman::class;
    protected static ?string $slug = 'pinjaman';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('kode_transaksi')->label('Kode Transaksi')->searchable()->sortable(),
                TextColumn::make('user.name')->label('Peminjam')->searchable()->sortable(),
                TextColumn::make('book.judul')->label('Buku')->searchable()->sortable(),
                TextColumn::make('tanggal_pinjam')->date()->label('Tanggal Pinjam')->sortable(),
                TextColumn::make('tanggal_kembali')->date()->label('Tanggal Kembali')->sortable(),
                TextColumn::make('tanggal_kembali_asli')->date()->label('Tanggal Kembali Asli')->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'dipinjam' => 'warning',
                        'terlambat' => 'danger',
                        'menunggu_validasi' => 'info',
                        'dikembalikan' => 'success',
                        default => 'gray',
                    }),
            ])
            ->actions([
                Action::make('validasiPengembalian')
                    ->label('Validasi')
                    ->icon('heroicon-m-check-circle')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'menunggu_validasi')
                    ->requiresConfirmation()
                    ->modalHeading('Validasi Pengembalian Buku')
                    ->modalDescription('Pastikan buku sudah diterima dalam kondisi baik dan sesuai catatan.')
                    ->modalSubmitActionLabel('Validasi Sekarang')
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'dikembalikan',
                            'tanggal_kembali_asli' => now(),
                        ]);
                        $record->book?->increment('stok');
                    }),
    Action::make('exportWithDate')
        ->label('Export Berdasarkan Tanggal')
        ->form([
            DatePicker::make('start_date')->label('Dari Tanggal')->required(),
            DatePicker::make('end_date')->label('Sampai Tanggal')->required(),
        ])
        ->action(fn (array $data) =>
            Excel::download(
                new PinjamanExport(),
                'laporan_peminjaman_' . now()->format('Ymd_His') . '.xlsx'
            )
        )
        ->icon('heroicon-o-arrow-down-tray')
        ->color('info')
        ->modalHeading('Export Data dengan Filter Tanggal')
        ->modalSubmitActionLabel('Download'),

    EditAction::make(),
    DeleteAction::make(),
                DeleteAction::make(),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'dipinjam' => 'Dipinjam',
                        'terlambat' => 'Terlambat',
                        'menunggu_validasi' => 'Menunggu Validasi',
                        'dikembalikan' => 'Dikembalikan',
                    ])
                    ->default(null),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPinjaman::route('/'),
            'create' => Pages\CreatePinjaman::route('/create'),
            'edit' => Pages\EditPinjaman::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Data Peminjaman';
    }

    public static function getModelLabel(): string
    {
        return 'Pinjaman';
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->with('denda');
    }

    public static function getPluralModelLabel(): string
    {
        return 'Pinjaman';
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()?->role === 'admin';
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()?->role === 'admin';
    }
}
