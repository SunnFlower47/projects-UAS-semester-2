<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('Email')
                ->required()
                ->email()
                ->unique()
                ->maxLength(255),

            TextInput::make('password')
                ->label('Password')
                ->password()
                ->required()
                ->maxLength(255),

            Select::make('role')
                ->label('Role')
                ->options([
                    'admin' => 'Admin',
                    'user' => 'User',
                ])
                ->default('user')
                ->required(),

            FileUpload::make('image')
                ->label('Image')
                ->directory('users')
                ->image()
                ->imageEditor()
                ->nullable(),
        ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Hash password sebelum disimpan
        $data['password'] = Hash::make($data['password']);
        return $data;
    }
}
