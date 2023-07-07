<?php

namespace App\Filament\Resources\BuyResource\Pages;

use App\Filament\Resources\BuyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBuys extends ListRecords
{
    protected static string $resource = BuyResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
