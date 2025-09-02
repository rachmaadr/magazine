<?php

namespace App\Filament\Resources\BannerAds\Pages;

use App\Filament\Resources\BannerAds\BannerAdsResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBannerAds extends CreateRecord
{
    protected static string $resource = BannerAdsResource::class;
    protected function getRedirectUrl(): string{
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Banner Advertisment Barhasil Dibuat';
    }

}
