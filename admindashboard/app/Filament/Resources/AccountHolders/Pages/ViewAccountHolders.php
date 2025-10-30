<?php

namespace App\Filament\Resources\AccountHolders\Pages;

use App\Filament\Resources\AccountHolders\AccountHoldersResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAccountHolders extends ViewRecord
{
    protected static string $resource = AccountHoldersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
