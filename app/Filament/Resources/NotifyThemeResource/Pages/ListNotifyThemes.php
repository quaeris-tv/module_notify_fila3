<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotifyThemeResource\Pages;

<<<<<<< HEAD
use Filament\Actions;
use Filament\Tables\Actions as TableActions;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Resources\Pages\ListRecords;
=======
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
use Modules\Notify\Models\NotifyTheme;
>>>>>>> origin/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Notify\Filament\Resources\NotifyThemeResource;

class ListNotifyThemes extends XotBaseListRecords
{
    protected static string $resource = NotifyThemeResource::class;

    public function getListTableColumns(): array
    {
        return [
<<<<<<< HEAD
            'id' => Columns\TextColumn::make('id')
                ->sortable(),
            'lang' => Columns\TextColumn::make('lang')
                ->sortable(),
            'type' => Columns\TextColumn::make('type')
                ->sortable(),
            'post_id' => Columns\TextColumn::make('post_id')
                ->sortable(),
            'post_type' => Columns\TextColumn::make('post_type')
                ->sortable(),
            'logo_src' => Columns\TextColumn::make('logo_src')
                ->sortable(),
            'created_at' => Columns\TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            'updated_at' => Columns\TextColumn::make('updated_at')
                ->label('Ultima Modifica')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
=======
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

    public function getTableFilters(): array
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
>>>>>>> origin/dev
        ];
    }

    public function getTableFilters(): array
    {
        return [
            'lang' => Filters\SelectFilter::make('lang')
                ->options(NotifyThemeResource::fieldOptions('lang')),
            'post_type' => Filters\SelectFilter::make('post_type')
                ->options(NotifyThemeResource::fieldOptions('post_type')),
            'type' => Filters\SelectFilter::make('type')
                ->options(NotifyThemeResource::fieldOptions('type'))
        ];
    }

   
}
