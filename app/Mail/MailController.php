<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
//password google aplikasi untuk repositori: wcjc rnae eicx wfvz
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
        return $this->from('bimasislam@kemenag.go.id', 'Bimas Islam Kemenag RI')
                ->subject($this->param['subject_title'])
                ->view($this->param['views_file'], $data);
    }
}
