<?php
/**
 * @see https://github.com/spatie/laravel-health/discussions/153
 * @see https://yalamati.medium.com/using-two-different-smtp-mailers-in-laravel-6bd1e6646996
 */

declare(strict_types=1);

namespace Modules\Notify\Filament\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Section;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Emails\EmailDataEmail;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

/**
 * @property ComponentContainer $emailForm
 */
class TestSmtpPage extends Page implements HasForms
{
    use InteractsWithForms;
    use NavigationLabelTrait;

    public ?array $emailData = [];

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static string $view = 'notify::filament.pages.send-email';

    public function mount(): void
    {
        $this->fillForms();
    }

    public function emailForm(Form $form): Form
    {
        /*
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        */
        $this->emailData['subject'] = 'test';
        $email = XotData::make()->super_admin;

        return $form
            ->schema(
                [
                    Section::make()
                        // ->description('Update your account\'s profile information and email address.')
                        ->schema(
                            [
                                Forms\Components\TextInput::make('mail_driver')
                                    ->default(env('MAIL_DRIVER')),
                                Forms\Components\TextInput::make('mail_host')
                                    ->default(env('MAIL_HOST')),
                                Forms\Components\TextInput::make('mail_port')
                                    ->numeric()
                                    ->default(env('MAIL_PORT')),
                                Forms\Components\TextInput::make('mail_username')
                                    ->default(env('MAIL_USERNAME')),
                                Forms\Components\TextInput::make('mail_password')
                                    ->default(env('MAIL_PASSWORD')),
                                Forms\Components\TextInput::make('mail_encryption')
                                    ->default(env('MAIL_ENCRYPTION')),
                            ])->columns(3),
                    Section::make()
                    // ->description('Update your account\'s profile information and email address.')
                    ->schema(
                        [
                            Forms\Components\TextInput::make('email_to')
                                // ->unique(ignoreRecord: true)
                                ->default($email)
                                ->email()
                                ->required(),
                            Forms\Components\TextInput::make('subject')
                                ->default('test')
                                ->required(),
                            Forms\Components\RichEditor::make('body')
                                ->default('test body')
                                ->required(),
                        ]
                    ),
                ]
            )
            ->statePath('emailData');
    }

    public function sendEmail(): void
    {
        $data = $this->emailForm->getState();
        // dddx($data);
        try {
            $transport = new EsmtpTransport($data['mail_host'], intval($data['mail_port']), $data['mail_encryption']);
            if (null !== $data['mail_username'] && null !== $data['mail_password']) {
                $transport->setUsername($data['mail_username']);
                $transport->setPassword($data['mail_password']);
            }
            $transport->start();
            dddx('ok');
        } catch (\Exception $e) {
            // return $result->failed($e->getMessage());
            dddx($e->getMessage());
        }
        $email_data = EmailData::from($data);

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
