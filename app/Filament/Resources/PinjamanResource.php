<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PinjamanResource\Pages;
use App\Filament\Resources\PinjamanResource\RelationManagers;
use App\Models\Pinjaman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class PinjamanResource extends Resource
{
    protected static ?string $model = Pinjaman::class;

    protected static ?string $slug = 'pinjaman';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('user.name')->label('Peminjam')->sortable()->searchable(),
            TextColumn::make('book.judul')->label('Buku')->sortable()->searchable(),
            TextColumn::make('tanggal_pinjam')->date()->label('Tanggal Pinjam')->sortable(),
            TextColumn::make('tanggal_kembali')->date()->label('Tanggal Kembali')->sortable(),
            TextColumn::make('tanggal_kembali_asli')->date()->label('Tanggal Kembali Asli')->sortable(),
            TextColumn::make('status')->label('Status')->sortable(),
        ])
        ->filters([
            //
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
        return [

        ];
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
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-clipboard-document-list';
    }
    public static function getModelLabel(): string
    {
        return 'loan';
    }
    public static function getPluralModelLabel(): string
    {
        return 'loans';
    }
}
