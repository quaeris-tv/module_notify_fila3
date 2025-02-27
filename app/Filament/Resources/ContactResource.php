<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources;

use Filament\Forms\Form;
<<<<<<< HEAD
use Filament\Forms;
=======
use Modules\Notify\Filament\Resources\ContactResource\Pages\CreateContact;
// use Modules\Notify\Filament\Resources\ContactResource\RelationManagers;
use Modules\Notify\Filament\Resources\ContactResource\Pages\EditContact;
// use Filament\Forms;
use Modules\Notify\Filament\Resources\ContactResource\Pages\ListContacts;
>>>>>>> ea1c9cdf (up)
use Modules\Notify\Models\Contact;
use Modules\Xot\Filament\Resources\XotBaseResource;

class ContactResource extends XotBaseResource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

<<<<<<< HEAD
    public static function getFormSchema(): array
=======
    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                ]
            );
    }

    public static function getRelations(): array
>>>>>>> ea1c9cdf (up)
    {
        return [
            'name'=>Forms\Components\TextInput::make('name')
                ->required(),
            'email'=>Forms\Components\TextInput::make('email')
                ->email()
                ->required(),
            'phone'=>Forms\Components\TextInput::make('phone')
                ->tel()
                ->nullable(),
        ];
    }
}
