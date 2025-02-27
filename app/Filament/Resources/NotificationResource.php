<?php

namespace Modules\Notify\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Notify\Filament\Resources\NotificationResource\Pages;
=======
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\CreateNotification;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\EditNotification;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ListNotifications;
>>>>>>> b69ee131 (up)
use Modules\Notify\Models\Notification;
use Modules\Xot\Filament\Resources\XotBaseResource;

class NotificationResource extends XotBaseResource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            'type' => TextInput::make('type')
                ->required()
                ->label('Notification Type'),
<<<<<<< HEAD

            'notifiable_type' => TextInput::make('notifiable_type')
                ->required()
                ->label('Notifiable Type'),

=======
            
            'notifiable_type' => TextInput::make('notifiable_type')
                ->required()
                ->label('Notifiable Type'),
            
>>>>>>> b69ee131 (up)
            'notifiable_id' => TextInput::make('notifiable_id')
                ->required()
                ->numeric()
                ->label('Notifiable ID'),
<<<<<<< HEAD

=======
            
>>>>>>> b69ee131 (up)
            'data' => KeyValue::make('data')
                ->label('Notification Data')
                ->keyLabel('Key')
                ->valueLabel('Value')
                ->columnSpanFull(),
<<<<<<< HEAD

            'read_at' => DateTimePicker::make('read_at')
                ->label('Read At')
                ->nullable(),

            'created_by' => TextInput::make('created_by')
                ->label('Created By')
                ->disabled(),

            'updated_by' => TextInput::make('updated_by')
                ->label('Updated By')
                ->disabled(),
=======
            
            'read_at' => DateTimePicker::make('read_at')
                ->label('Read At')
                ->nullable(),
            
            'created_by' => TextInput::make('created_by')
                ->label('Created By')
                ->disabled(),
            
            'updated_by' => TextInput::make('updated_by')
                ->label('Updated By')
                ->disabled()
>>>>>>> b69ee131 (up)
        ];
    }

    public static function getRelations(): array
    {
        return [
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
