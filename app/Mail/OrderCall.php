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
        return $this->markdown('emails.order-call');
    }
}
