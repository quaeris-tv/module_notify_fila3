<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Form;
use Modules\Notify\Filament\Resources\ContactResource\Pages\CreateContact;
use Modules\Notify\Filament\Resources\ContactResource\Pages\EditContact;
use Modules\Notify\Filament\Resources\ContactResource\Pages\ListContacts;
=======
use Filament\Forms;
>>>>>>> origin/dev
use Modules\Notify\Models\Contact;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ContactResource extends XotBaseResource
{
    protected static ?string $model = Contact::class;

<<<<<<< HEAD
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
    {
        return [
            // Form fields here
        ];
    }

    public static function getRelations(): array
=======
    public static function getFormSchema(): array
>>>>>>> origin/dev
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Contact Name')
                ->required(),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
            Forms\Components\TextInput::make('phone')
                ->label('Phone Number')
                ->tel()
                ->nullable(),
        ];
    }
}
