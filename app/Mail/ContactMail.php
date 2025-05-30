<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
   
    
        public $data;
    
        public function __construct($data)
        {
            $this->data = $data;
        }
    
        public function build()
        {
            return $this->from(env('starsseven.2025@gmail.com'))
                        ->subject('Liên hệ mới từ khách hàng')
                        ->view('emails.contact')
                        ->with('data', $this->data);
        }
    
}
