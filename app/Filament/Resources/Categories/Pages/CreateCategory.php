<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    //override route url from create to index list
    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): string|null{
        return 'Kategori Berhasil Dibuat!';
    }
}
