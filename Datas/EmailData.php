<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Spatie\LaravelData\Data;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as MimeEmail;

class EmailData extends Data
{
    public string $to;

    public string $from;

    public string $from_email;

    public string $subject;

    public string $body_html;

    public ?string $body=null;

    public function getFrom(): Address
    {
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
            ->subject($this->subject)
            ->html($this->body_html)
            ->text(strip_tags($this->body));

        return $email;
    }
}
