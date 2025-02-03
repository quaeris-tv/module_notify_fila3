<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotifyThemeResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
use Modules\Notify\Models\NotifyTheme;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListNotifyThemes extends XotBaseListRecords
{
    protected static string $resource = NotifyThemeResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
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
            ])
            ->filters([
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
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
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
