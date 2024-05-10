<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\App;
use Modules\Notify\Datas\EmailData;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Modules\Notify\Emails\EmailDataEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Filament\Forms\Concerns\InteractsWithForms;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;

/**
 * @property ComponentContainer $emailForm
 */
class SendEmailParameters extends Page implements HasForms
{
    use InteractsWithForms;
    use NavigationLabelTrait;

    public ?array $emailData = [];

    // protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static string $view = 'notify::filament.pages.send-email-parameters';

    public function mount(): void
    {
        $this->fillForms();
    }

    public function emailForm(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\Section::make()
                        // ->description('Update your account\'s profile information and email address.')
                        ->schema(
                            [
                                Forms\Components\TextInput::make('mail_mailer'),
                                Forms\Components\TextInput::make('mail_host'),
                                Forms\Components\TextInput::make('mail_port')->numeric(),
                                Forms\Components\TextInput::make('mail_username'),
                                Forms\Components\TextInput::make('mail_password'),
                                Forms\Components\TextInput::make('mail_encryption'),
                                Forms\Components\TextInput::make('mail_from_address'),
                                Forms\Components\TextInput::make('mail_from_name'),
                                Forms\Components\TextInput::make('email_to')
                                    // ->unique(ignoreRecord: true)
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('subject')
                                    ->required(),
                                Forms\Components\RichEditor::make('body')
                                    ->required(),
                            ]
                        ),
                ]
            )
            ->model($this->getUser())
            ->statePath('emailData');
    }

    public function sendEmail(): void
    {
        $data = $this->emailForm->getState();
        $email_data = EmailData::from($data);

        Config::set('mail.default', $data['mail_mailer']);
        Config::set('mail.mailers.smtp.transport', $data['mail_mailer']);
        Config::set('mail.mailers.smtp.host', $data['mail_host']); 
        Config::set('mail.mailers.smtp.port', $data['mail_port']); 
        Config::set('mail.mailers.smtp.encryption', $data['mail_encryption']); 
        Config::set('mail.mailers.smtp.username', $data['mail_username']); 
        Config::set('mail.mailers.smtp.password', $data['mail_password']); 

        // dddx(config('mail'));

        Mail::to($data['email_to'])->send(
            new EmailDataEmail($email_data)
        );

        Notification::make()
            ->success()
            // ->title(__('filament-panels::pages/auth/edit-profile.notifications.saved.title'))
            ->title(__('check your email client'))
            ->send();
    }

    protected function getForms(): array
    {
        return [
            'emailForm',
        ];
    }

    protected function getEmailFormActions(): array
    {
        return [
            Action::make('emailFormActions')
                // ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->label(__('send'))
                ->submit('emailFormActions'),
        ];
    }

    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

        if (! $user instanceof Model) {
            throw new \Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }

        return $user;
    }

    protected function fillForms(): void
    {
        // $data = $this->getUser()->attributesToArray();

        // $this->editProfileForm->fill($data);
        $this->emailForm->fill();
    }
}
