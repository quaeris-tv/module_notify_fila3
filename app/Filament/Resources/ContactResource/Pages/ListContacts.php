<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\ContactResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Modules\Notify\Filament\Resources\ContactResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListContacts extends XotBaseListRecords
{
    protected static string $resource = ContactResource::class;

    public function getListTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')
                ->numeric()
                ->sortable(),
            'name' => TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'email' => TextColumn::make('email')
                ->searchable()
                ->sortable(),
            'phone' => TextColumn::make('phone')
                ->searchable()
                ->sortable(),
            'message' => TextColumn::make('message')
                ->searchable()
                ->sortable(),
            'is_read' => IconColumn::make('is_read')
                ->boolean(),
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
            \Filament\Tables\Filters\Filter::make('is_read')
                ->query(fn ($query) => $query->where('is_read', true))
                ->label('Read'),
            \Filament\Tables\Filters\Filter::make('is_unread')
                ->query(fn ($query) => $query->where('is_read', false))
                ->label('Unread'),
        ];
    }

    public function getTableActions(): array
    {
        return [
            ViewAction::make(),
            EditAction::make(),
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
