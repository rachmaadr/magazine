<?php

namespace App\Filament\Resources\BannerAds;

use App\Filament\Resources\BannerAds\Pages\CreateBannerAds;
use App\Filament\Resources\BannerAds\Pages\EditBannerAds;
use App\Filament\Resources\BannerAds\Pages\ListBannerAds;
use App\Filament\Resources\BannerAds\Schemas\BannerAdsForm;
use App\Filament\Resources\BannerAds\Tables\BannerAdsTable;
use App\Models\BannerAds;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerAdsResource extends Resource
{
    protected static ?string $model = BannerAds::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return BannerAdsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BannerAdsTable::configure($table);
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
            'index' => ListBannerAds::route('/'),
            'create' => CreateBannerAds::route('/create'),
            'edit' => EditBannerAds::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
