<?php

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Modules\Notify\Models\Notification;
use Modules\Notify\Filament\Resources\NotificationResource\Pages;
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * NotificationResource
 */
class NotificationResource extends XotBaseResource
{
    protected static ?string $model = Notification::class;

    public static function getFormSchema(): array
    {
        return [
            TextInput::make('type')
                ->required()
                ->maxLength(255),
            TextInput::make('notifiable_type')
                ->required()
                ->maxLength(255),
            TextInput::make('notifiable_id')
                ->required()
                ->numeric(),
            Textarea::make('data')
                ->required()
                ->columnSpanFull(),
            TextInput::make('read_at')
                ->maxLength(255),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotifications::route('/'),
            'view' => Pages\ViewNotification::route('/{record}'),
        ];
    }
}
