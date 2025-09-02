<?php

namespace App\Filament\Resources\BannerAds\Pages;

use App\Filament\Resources\BannerAds\BannerAdsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBannerAds extends EditRecord
{
    protected static string $resource = BannerAdsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
    protected function getRedirectUrl(): string|null{
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): string|null{
        return 'Banner Advertisment Berhasil Diubah';
    }
}
