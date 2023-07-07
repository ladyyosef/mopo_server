<?php

namespace App\Filament\Resources\CurrencypriceResource\Pages;

use App\Filament\Resources\CurrencypriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCurrencyprices extends ListRecords
{
    protected static string $resource = CurrencypriceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
