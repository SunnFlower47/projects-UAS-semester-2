<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;


class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;




    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('nama')->sortable()->searchable(),
            TextColumn::make('deskripsi')->limit(255)->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-tag';
    }
}
