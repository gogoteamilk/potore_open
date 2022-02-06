<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $title;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $inputs )
    {
        $this->email = $inputs['email'];
        $this->name = $inputs['name'];
        $this->title = $inputs['title'];
        $this->body  = $inputs['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address', 'kopotakumi@gmai.com'))
            ->subject('お問合せありがとうございます。')
            ->markdown('information.contact_mail')
            ->with([
                'email' => $this->email,
                'name' => $this->name,
                'title' => $this->title,
                'body'  => $this->body,
            ]);
    }
}