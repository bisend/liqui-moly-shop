<?php

namespace App\Mail;

use App\Helpers\Languages;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCall extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;

    public $phoneNumber;

    public $language;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $phoneNumber, $language = Languages::DEFAULT_LANGUAGE)
    {
        Languages::localizeApp($language);
        
        $this->userName = $userName;

        $this->phoneNumber = $phoneNumber;

        $this->language = $language;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('email.call_order'))->markdown('emails.order-call');
    }
}
