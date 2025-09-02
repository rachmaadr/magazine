<?php

namespace App\Filament\Resources\ArticleNews\Pages;

use App\Filament\Resources\ArticleNews\ArticleNewsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditArticleNews extends EditRecord
{
    protected static string $resource = ArticleNewsResource::class;
    protected function getRedirectUrl(): string|null{
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
    protected function getSavedNotificationTitle(): string|null{
        return 'Artikel Berhasil Diubah';
    }
}
