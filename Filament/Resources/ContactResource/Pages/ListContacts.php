<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\ContactResource\Pages;

use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Xot\Filament\Traits\HasXotTable;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Notify\Filament\Resources\ContactResource;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

class ListContacts extends XotBaseListRecords
{


    protected static string $resource = ContactResource::class;





    public function getListTableColumns(): array
    {
        return [
        ];
    }

    public function getTableActions(): array
    {
        return [
            EditAction::make()
                ->label(''),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            DeleteBulkAction::make(),
        ];
    }



    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
