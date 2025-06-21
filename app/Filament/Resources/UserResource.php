<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\imageColumn;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Manajemen Perpustakaan';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';


public static function table(Table $table): Table
{
    return $table
        ->columns([


            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('email')
                ->searchable(),

            TextColumn::make('role'),

            ImageColumn::make('photo')
                ->label('Foto')
                ->circular()
                ->height(40),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
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
