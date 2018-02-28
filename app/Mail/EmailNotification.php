<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;


    public $mailContent;
    public $attarchment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailContent ,$attarchment)
    {
        $this->mailContent = $mailContent;
        $this->attarchment = $attarchment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->attarchment == null)
            return $this->view('emails.user-contact');
        else
            return $this->view('emails.user-contact')
                        ->attach($this->attarchment,['as'=> 'CV.pdf', 'mime' => 'application/pdf']);
    }
}
