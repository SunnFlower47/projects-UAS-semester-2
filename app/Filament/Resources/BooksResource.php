<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BooksResource\Pages;
use App\Filament\Resources\BooksResource\RelationManagers;
use App\Models\Book;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn as imageColumn;
use Illuminate\Database\Eloquent\Model;


class BooksResource extends Resource
{
    protected static ?string $model = Book::class;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->sortable()->searchable(),
                TextColumn::make('pengarang')->sortable()->searchable(),
                TextColumn::make('penerbit')->sortable()->searchable(),
                TextColumn::make('genre')->sortable()->searchable(),
                TextColumn::make('tahun')->sortable(),
                TextColumn::make('tempat_terbit')->sortable()->searchable(),
                TextColumn::make('isbn')->sortable()->searchable(),
                TextColumn::make('jumlah_halaman')->sortable(),
                TextColumn::make('lokasi_rak')->sortable(),
                TextColumn::make('stok')->sortable(),
                TextColumn::make('bahasa')->sortable(),
                imageColumn::make('cover')
                    ->label('Cover')
                    ->circular()
                    ->size(50)
                    ->default('https://via.placeholder.com/150'),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(20)
                    ->tooltip(fn ($record) => $record->deskripsi)
                    ->sortable(),
                TextColumn::make('kategori.nama')->label('Kategori'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBooks::route('/create'),
            'edit' => Pages\EditBooks::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Data Buku';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-book-open';
    }

    public static function getPluralModelLabel(): string
    {
        return 'data buku';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class]);
    }

    public static function canCreate(): bool
    {
        return \Illuminate\Support\Facades\Auth::user()?->role === 'admin';
    }

    public static function canEdit(Model $record): bool
    {
        return \Illuminate\Support\Facades\Auth::user()?->role === 'admin';
    }

    public static function canDelete(Model $record): bool
    {
        return \Illuminate\Support\Facades\Auth::user()?->role === 'admin';
    }
}
