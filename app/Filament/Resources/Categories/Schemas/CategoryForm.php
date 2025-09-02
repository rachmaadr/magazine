<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Form\Form;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))->live(debounce: 250)->maxLength(255),
                TextInput::make('slug')
                    ->required()->disabled(),
                FileUpload::make('icon')
                    ->image()
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
