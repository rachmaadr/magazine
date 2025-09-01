<?php

namespace App\Filament\Resources\BannerAds\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BannerAdsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('link')
                    ->required()->activeUrl(),
                Select::make('is_active')
                    ->options(['active' => 'Active', 'not_active' => 'Not active'])
                    ->default('not_active')
                    ->required(),
                Select::make('type')
                    ->options([
                        'banner' => 'Banner',
                        'square' => 'Square'
                    ]),
                FileUpload::make('thumbnail')
                    ->required()
                    ->image(),
            ]);
    }
}
