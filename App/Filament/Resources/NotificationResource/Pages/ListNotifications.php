<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
<<<<<<< HEAD
=======
use Filament\Tables;
>>>>>>> fec3c4996a4c64b9888772002ccf5593b2cd71a7

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

    public function getTableFilters(): array
    {
        return [
<<<<<<< HEAD
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
            'read' => Tables\Filters\Filter::make('is_read')
                ->query(fn ($query) => $query->where('read_at', '!=', null))
                ->label('Read'),
            'unread' => Tables\Filters\Filter::make('is_unread')
                ->query(fn ($query) => $query->whereNull('read_at'))
                ->label('Unread'),
            'type' => Tables\Filters\SelectFilter::make('type')
                ->options([
                    'info' => 'Info',
                    'success' => 'Success',
                    'warning' => 'Warning',
                    'error' => 'Error',
                ])
                ->multiple(),
        ];
    }

  
>>>>>>> fec3c4996a4c64b9888772002ccf5593b2cd71a7
}
