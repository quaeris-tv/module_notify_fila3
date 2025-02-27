<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Form;
<<<<<<< HEAD
use Filament\Forms;
=======
use Modules\Notify\Filament\Resources\ContactResource\Pages\CreateContact;
use Modules\Notify\Filament\Resources\ContactResource\Pages\EditContact;
use Modules\Notify\Filament\Resources\ContactResource\Pages\ListContacts;
>>>>>>> 962ac989 (Auto update submodule)
use Modules\Notify\Models\Contact;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ContactResource extends XotBaseResource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getFormSchema(): array
<<<<<<< HEAD
=======
    {
        return [
            // Form fields here
        ];
    }

    public static function getRelations(): array
>>>>>>> 962ac989 (Auto update submodule)
    {
        return [
            'name' => Forms\Components\TextInput::make('name')
                ->required(),
            'email' => Forms\Components\TextInput::make('email')
                ->email()
                ->required(),
            'phone' => Forms\Components\TextInput::make('phone')
                ->tel()
                ->nullable(),
        ];
    }
}
