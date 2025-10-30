<?php

namespace App\Filament\Resources\AccountHolders\Pages;

use App\Filament\Resources\AccountHolders\AccountHoldersResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAccountHolders extends EditRecord
{
    protected static string $resource = AccountHoldersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
