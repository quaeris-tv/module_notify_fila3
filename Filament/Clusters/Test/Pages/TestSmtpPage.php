<?php
/**
 * @see https://github.com/spatie/laravel-health/discussions/153
 * @see https://yalamati.medium.com/using-two-different-smtp-mailers-in-laravel-6bd1e6646996
 * @see https://symfony.com/doc/current/mailer.html
 * @see https://stackoverflow.com/questions/26546824/multiple-mail-configurations
 * @see https://azafocossa.medium.com/how-to-set-two-or-more-env-variables-for-email-in-laravel-63e603d383f
 * @see https://github.com/molteber/puz-dynamic-mail
 * @see https://laravel-news.com/allowing-users-to-send-email-with-their-own-smtp-settings-in-laravel
 * @see https://www.reddit.com/r/laravel/comments/qe2jre/using_different_smtp_configuration_sending/?rdt=64778&onetap_auto=true&one_tap=true
 * @see https://benjamincrozat.com/laravel-emails-mailtrap-smtp
 * @see https://docs.sendgrid.com/for-developers/sending-email/laravel
 * @see https://github.com/iwasherefirst2/laravel-multimail
 * @see https://blog.genijaho.dev/allowing-users-to-send-emails-with-their-own-smtp-settings-in-laravel-9
 * @see https://mailazy.com/docs/guide/smtp/integration-with-laravel/
 * @see https://www.meghrajtechnosoft.com/sending-mail-with-dynamic-smtp-configuration/
 */

declare(strict_types=1);

namespace Modules\Notify\Filament\Clusters\Test\Pages;

use Exception;
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
use Modules\Notify\Datas\SmtpData;
use Modules\Notify\Filament\Clusters\Test;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport\Smtp\SmtpTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Webmozart\Assert\Assert;

/**
 * @property ComponentContainer $emailForm
 */
class TestSmtpPage extends Page implements HasForms
{
    use InteractsWithForms;
    // use NavigationLabelTrait;

    public ?array $emailData = [];

    public ?string $error_message = null;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    protected static string $view = 'notify::filament.pages.send-email';

    protected static ?string $cluster = Test::class;

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
                    Section::make('SMTP')
                        // ->description('Update your account\'s profile information and email address.')
                        ->schema(
                            [
                                // Forms\Components\TextInput::make('driver')
                                //    ->default(env('MAIL_DRIVER', 'smtp')),
                                Forms\Components\TextInput::make('host')
                                    ->default(env('MAIL_HOST')),
                                Forms\Components\TextInput::make('port')
                                    ->numeric()
                                    ->default(env('MAIL_PORT')),
                                Forms\Components\TextInput::make('username')
                                    ->default(env('MAIL_USERNAME')),
                                Forms\Components\TextInput::make('password')
                                    ->default(env('MAIL_PASSWORD')),
                                Forms\Components\TextInput::make('encryption')
                                    ->default(env('MAIL_ENCRYPTION')),
                            ])->columns(3),
                    Section::make('MAIL')
                    // ->description('Update your account\'s profile information and email address.')
                        ->schema(
                            [
                                Forms\Components\TextInput::make('email_from_address')
                                    // ->unique(ignoreRecord: true)
                                    ->default(env('MAIL_FROM_ADDRESS', $email))
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('email_from_name')
                                    // ->unique(ignoreRecord: true)
                                    ->default(env('MAIL_FROM_NAME')),
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
                                    ->required()
                                    ->columnSpanFull(),
                            ]
                        )->columns(3),
                ]
            )
            ->statePath('emailData');
    }

    public function sendEmail(): void
    {
        $data = $this->emailForm->getState();
        $smtp = SmtpData::from($data);

        // Swift_SmtpTransport
        try {
            $transport = $smtp->getTransport();
            $transport->start();
            $this->error_message = null;
        } catch (Exception $e) {
            $this->error_message = $e->getMessage();

            return;
        }

        $email_data = EmailData::from($data);

        // Parameter #1 ...$addresses of method Symfony\Component\Mime\Email::from() expects
        // string|Symfony\Component\Mime\Address, mixed given.
        Assert::string($email_from_address = $data['email_from_address']);
        Assert::string($email_from_name = $data['email_from_name']);
        Assert::string($email_to = $data['email_to']);

        $from = new Address($email_from_address, $email_from_name);

        $mailer = new Mailer($transport);
        $email = (new Email)
            ->from($from)
            ->to($email_to)
            ->subject($email_data->subject)
            ->text(strip_tags($email_data->body))
            ->html($email_data->body);
        try {
            $mailer->send($email);
        } catch (Exception $e) {
            $this->error_message = $e->getMessage();

            return;
        }

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
            throw new Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
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
