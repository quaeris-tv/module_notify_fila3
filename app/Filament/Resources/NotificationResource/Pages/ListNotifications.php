<?php

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListNotifications extends XotBaseListRecords
{
    protected static string $resource = NotificationResource::class;

    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->numeric()
                ->sortable(),
            'type' => TextColumn::make('type')
                ->searchable()
                ->sortable(),
            'notifiable' => TextColumn::make('notifiable.name')
                ->searchable()
                ->sortable(),
            'data' => TextColumn::make('data')
                ->searchable(),
            'read_at' => TextColumn::make('read_at')
                ->dateTime()
                ->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            'updated_at' => TextColumn::make('updated_at')
                ->dateTime()
                ->sortable(),
        ];
    }
<<<<<<< HEAD

    public function getTableFilters(): array
    {
        return [
            \Filament\Tables\Filters\SelectFilter::make('type')
                ->options(fn () => \Modules\Notify\Models\Notification::distinct()->pluck('type', 'type')->toArray()),
            \Filament\Tables\Filters\Filter::make('read')
                ->query(fn ($query) => $query->whereNotNull('read_at')),
            \Filament\Tables\Filters\Filter::make('unread')
                ->query(fn ($query) => $query->whereNull('read_at')),
        ];
    }

    public function getTableActions(): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
            DeleteAction::make(),
        ];
    }

    public function getTableBulkActions(): array
    {
        return [
            \Filament\Tables\Actions\DeleteBulkAction::make(),
        ];
    }
=======
>>>>>>> origin/dev
}
