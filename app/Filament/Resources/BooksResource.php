<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BooksResource\Pages;
use App\Filament\Resources\BooksResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BooksResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('judul')->required(),
            Forms\Components\TextInput::make('pengarang')->required(),
            Forms\Components\TextInput::make('penerbit')->required(),
            Forms\Components\TextInput::make('tahun')->numeric()->required(),
            Forms\Components\TextInput::make('stok')->numeric()->required(),
            Forms\Components\Select::make('kategori_id')
                ->relationship('kategori', 'nama')
                ->required(),
        ]);
}


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('judul')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('pengarang')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('penerbit')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('tahun')->sortable(),
            Tables\Columns\TextColumn::make('stok')->sortable(),
            Tables\Columns\TextColumn::make('kategori.nama')->label('Kategori'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBooks::route('/create'),
            'edit' => Pages\EditBooks::route('/{record}/edit'),
        ];
    }
}
