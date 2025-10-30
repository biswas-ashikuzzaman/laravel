<?php

namespace App\Filament\Resources\AccountHolders\Pages;

use App\Filament\Resources\AccountHolders\AccountHoldersResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAccountHolders extends ListRecords
{
    protected static string $resource = AccountHoldersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
