<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
    }

    public function build()
    {        
        return $this->markdown('emails.test')
            ->to('parapua@sapo.pt')
            ->from('parapua@sapo.pt')
            ->with('url', route('recovery.index'))
            ->attach(public_path('/pdf/0001.pdf'), 
                [
                    'as' => 'name.pdf',
                    'mime' => 'application/pdf'
                ]
            )
            ->attach(public_path('/images/email.png'),
                [
                    'as' => 'image.png',
                ]
            );
    }
}
