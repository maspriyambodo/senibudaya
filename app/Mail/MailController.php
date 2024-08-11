<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
            'pass_reset_link' => $this->param['pass_reset_link'],
            'nama' => $this->param['nama']
        ];
        return $this->from('info@scentivaid.com')
                ->subject($this->param['subject_title'])
                ->view($this->param['views_file'], $data);
    }
}
