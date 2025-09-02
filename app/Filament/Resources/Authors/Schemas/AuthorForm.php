<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('occupation')->required()->maxLength(255),
                FileUpload::make('avatar')->image()
                    ->directory('magazine') // Folder di storage/app/public
                    ->visibility('public')
                    ->preserveFilenames()
                    ->disk('public')
                    ->imagePreviewHeight('150') // Tambahkan ini
                    ->loadingIndicatorPosition('left')
                    ->panelLayout('integrated')
                    ->required(),
            ]);
    }
}
