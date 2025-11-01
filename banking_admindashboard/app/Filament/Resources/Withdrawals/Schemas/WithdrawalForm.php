<?php

namespace App\Filament\Resources\Withdrawals\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WithdrawalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('account_id')
                    ->required()
                    ->numeric(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('reference')
                    ->default(null),
            ]);
    }
}
