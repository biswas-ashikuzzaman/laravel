<?php

namespace App\Filament\Resources\AccountHolders;

use App\Filament\Resources\AccountHolders\Pages\CreateAccountHolders;
use App\Filament\Resources\AccountHolders\Pages\EditAccountHolders;
use App\Filament\Resources\AccountHolders\Pages\ListAccountHolders;
use App\Filament\Resources\AccountHolders\Pages\ViewAccountHolders;
use App\Filament\Resources\AccountHolders\Schemas\AccountHoldersForm;
use App\Filament\Resources\AccountHolders\Schemas\AccountHoldersInfolist;
use App\Filament\Resources\AccountHolders\Tables\AccountHoldersTable;
use App\Models\AccountHolders;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccountHoldersResource extends Resource
{
    protected static ?string $model = AccountHolders::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Account_Holders';

    public static function form(Schema $schema): Schema
    {
        return AccountHoldersForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AccountHoldersInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AccountHoldersTable::configure($table);
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
            'index' => ListAccountHolders::route('/'),
            'create' => CreateAccountHolders::route('/create'),
            'view' => ViewAccountHolders::route('/{record}'),
            'edit' => EditAccountHolders::route('/{record}/edit'),
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
