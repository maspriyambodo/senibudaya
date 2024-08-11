<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Http\Request;

class MailController extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(private $param)
    {
        
    }
    
    public function build()
    {
        $data = [
            'user_email' => $this->param['user_email'],
            'pass_reset_link' => $this->param['pass_reset_link']
        ];
        return $this->from('info@scentivaid.com')
                ->subject($this->param['subject_title'])
                ->view('emails.reset_password', $data);
    }
}
