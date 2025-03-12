<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewNotification extends XotBaseViewRecord
{
    protected static string $resource = NotificationResource::class;
    
    /**
     * @return array<\Filament\Infolists\Components\Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            Section::make()
                ->schema([
                    'id' => TextEntry::make('id'),
                    'type' => TextEntry::make('type'),
                    'notifiable_type' => TextEntry::make('notifiable_type'),
                    'notifiable_id' => TextEntry::make('notifiable_id'),
                    'data' => TextEntry::make('data'),
                    'read_at' => TextEntry::make('read_at')
                        ->dateTime(),
                    'created_at' => TextEntry::make('created_at')
                        ->dateTime(),
                    'updated_at' => TextEntry::make('updated_at')
                        ->dateTime(),
                ])
        ];
    }
}
