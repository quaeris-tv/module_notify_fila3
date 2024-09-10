<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\UI\Enums\TableLayoutEnum;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;

class ListNotifications extends ListRecords
{
    public TableLayoutEnum $layoutView = TableLayoutEnum::GRID;

    protected static string $resource = NotificationResource::class;

<<<<<<< HEAD
=======
    public TableLayoutEnum $layoutView = TableLayoutEnum::GRID;

>>>>>>> 5547ac5 (up)
    protected function getTableHeaderActions(): array
    {
        return [
            TableLayoutToggleTableAction::make(),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
