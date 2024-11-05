<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as MimeEmail;

class EmailData extends Data
{
    public string $to;
    public ?string $from;
    public ?string $from_email;
    public string $subject;
    public string $body_html;
    public ?string $body=null;
    public array $attachments = [];

    public function getFrom(): Address
    {
        if($this->from==null){
            $this->from=config('mail.from.name', 'Default Sender');
        }
        if($this->from_email==null){
            $this->from_email=config('mail.from.address', 'default@example.com');
        }
        return new Address($this->from_email, $this->from);
    }

    public function getMimeEmail(): MimeEmail
    {
        if($this->body==null){
            $this->body=strip_tags($this->body_html);
        }
        
        $email = (new MimeEmail())
            ->from($this->getFrom())
            ->to($this->to)
            ->subject(strip_tags($this->subject))
            ->html($this->body_html)
            ->text(strip_tags($this->body));

        foreach ($this->attachments as $attachment) {
            $email->attachFromPath($attachment); //string $path, ?string $name = null, ?string $contentType = null
        }

        return $email;
    }
}
