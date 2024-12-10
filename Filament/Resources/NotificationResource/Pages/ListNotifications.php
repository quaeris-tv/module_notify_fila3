<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Xot\Filament\Traits\TransTrait;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Xot\Filament\Pages\XotBaseListRecords;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

class ListNotifications extends XotBaseListRecords
{

    protected static string $resource = NotificationResource::class;



    public function getGridTableColumns(): array
    {
        return [
        ];
    }

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('type'),
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
