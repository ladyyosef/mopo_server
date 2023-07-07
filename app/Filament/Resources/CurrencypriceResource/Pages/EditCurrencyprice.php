<?php

namespace App\Filament\Resources\CurrencypriceResource\Pages;

use App\Filament\Resources\CurrencypriceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCurrencyprice extends EditRecord
{
    protected static string $resource = CurrencypriceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
