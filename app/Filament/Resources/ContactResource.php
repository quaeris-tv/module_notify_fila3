<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Form;
<<<<<<< HEAD
=======
use Filament\Forms;
>>>>>>> fec3c4996a4c64b9888772002ccf5593b2cd71a7
use Modules\Notify\Models\Contact;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ContactResource extends XotBaseResource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
<<<<<<< HEAD
            // Form fields here

            Forms\Components\TextInput::make('name')
                ->label('Contact Name')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            Forms\Components\TextInput::make('phone')
                ->label('Phone Number')
=======
            'name'=>Forms\Components\TextInput::make('name')
                ->required(),
            'email'=>Forms\Components\TextInput::make('email')
                ->email()
                ->required(),
            'phone'=>Forms\Components\TextInput::make('phone')
>>>>>>> fec3c4996a4c64b9888772002ccf5593b2cd71a7
                ->tel()
                ->nullable(),
        ];
    }
}
