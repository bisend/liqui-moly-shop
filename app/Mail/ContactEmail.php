<?php

namespace App\Mail;

use App\Helpers\Languages;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $email;
    
    public $name;
    
    public $message;
    
    public $language;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $message, $language)
    {
        Languages::localizeApp($language);
        $this->email = $email;
        $this->name = $name;
        $this->message = $message;
        $this->language = $language;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('email.new_message'))->markdown('emails.contact');
    }
}
