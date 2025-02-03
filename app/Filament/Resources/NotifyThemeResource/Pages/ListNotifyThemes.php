<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotifyThemeResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
use Modules\Notify\Models\NotifyTheme;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListNotifyThemes extends XotBaseListRecords
{
    protected static string $resource = NotifyThemeResource::class;

    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->sortable()
                ->searchable(),
            TextColumn::make('lang')
                ->sortable()
                ->searchable(),
            TextColumn::make('type')
                ->sortable()
                ->searchable(),
            TextColumn::make('subject')
                ->sortable()
                ->searchable()
                ->limit(50),
            TextColumn::make('theme')
                ->sortable()
                ->searchable(),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ];
    }

    public function getListTableFilters(): array
    {
        return [
            SelectFilter::make('lang')
                ->options(NotifyThemeResource::fieldOptions('lang')),
            SelectFilter::make('type')
                ->options(NotifyThemeResource::fieldOptions('type')),
            SelectFilter::make('theme')
                ->options([
                    'empty' => 'empty',
                    'ark' => 'ark',
                    'minty' => 'minty',
                    'sunny' => 'sunny',
                    'widgets' => 'widgets',
                ]),
        ];
    }

    public function getListTableActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    public function getListTableBulkActions(): array
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

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Tutti'),
            'email' => Tab::make('Email')
                ->modifyQueryUsing(fn ($query) => $query->where('type', 'email')),
            'sms' => Tab::make('SMS')
                ->modifyQueryUsing(fn ($query) => $query->where('type', 'sms')),
            'telegram' => Tab::make('Telegram')
                ->modifyQueryUsing(fn ($query) => $query->where('type', 'telegram')),
        ];
    }
}
