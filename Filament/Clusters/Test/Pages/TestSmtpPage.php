<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Clusters\Test\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Illuminate\Support\Arr;
use Filament\Actions\Action;
use Webmozart\Assert\Assert;
use Filament\Facades\Filament;
use Modules\Xot\Datas\XotData;
use Symfony\Component\Mime\Email;
use Modules\Notify\Datas\SmtpData;
use Modules\Notify\Datas\EmailData;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mailer\Mailer;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Modules\Notify\Filament\Clusters\Test;
use Illuminate\Contracts\Auth\Authenticatable;
use Filament\Forms\Concerns\InteractsWithForms;

class TestSmtpPage extends Page implements HasForms
{
    use InteractsWithForms;

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
        $smtpConfig = Arr::get(config('mail'),'mailers.smtp');

       

        $this->emailData['subject'] = 'test';
        $defaultEmail = XotData::make()->super_admin;

        return $form
            ->schema(
                [
                    Section::make('SMTP')
                        ->schema(
                            [
                                Forms\Components\TextInput::make('host')
                                    ->default($smtpConfig['host']),
                                Forms\Components\TextInput::make('port')
                                    ->numeric()
                                    ->default($smtpConfig['port']),
                                Forms\Components\TextInput::make('username')
                                    ->default($smtpConfig['username']),
                                Forms\Components\TextInput::make('password')
                                    ->default($smtpConfig['password']),
                                Forms\Components\TextInput::make('encryption')
                                    ->default($smtpConfig['encryption']),
                            ]
                        )->columns(3),
                    Section::make('MAIL')
                        ->schema(
                            [
                                Forms\Components\TextInput::make('email_from_address')
                                    ->default(config('mail.from.address', $defaultEmail))
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('email_from_name')
                                    ->default(config('mail.from.name')),
                                Forms\Components\TextInput::make('email_to')
                                    ->default($defaultEmail)
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

        try {
            $transport = $smtp->getTransport();
            $transport->start();
            $this->error_message = null;
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();

            return;
        }

        $emailData = EmailData::from($data);

        Assert::string($email_from_address = $data['email_from_address']);
        Assert::string($email_from_name = $data['email_from_name']);
        Assert::string($email_to = $data['email_to']);

        $from = new Address($email_from_address, $email_from_name);

        $mailer = new Mailer($transport);
        $email = (new Email())
            ->from($from)
            ->to($email_to)
            ->subject($emailData->subject)
            ->text(strip_tags($emailData->body))
            ->html($emailData->body);

        try {
            $mailer->send($email);
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();

            return;
        }

        Notification::make()
            ->success()
            ->title(__('Controlla il tuo client di posta'))
            ->send();
    }

    protected function getForms(): array
    {
        return ['emailForm'];
    }

    protected function getEmailFormActions(): array
    {
        return [
            Action::make('emailFormActions')
                ->label(__('Invia'))
                ->submit('emailFormActions'),
        ];
    }

    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

        if (! $user instanceof Model) {
            throw new \Exception('L\'utente autenticato deve essere un modello Eloquent per consentire l\'aggiornamento della pagina del profilo.');
        }

        return $user;
    }

    protected function fillForms(): void
    {
        $this->emailForm->fill();
    }
}
