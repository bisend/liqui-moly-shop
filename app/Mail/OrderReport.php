<?php

namespace App\Mail;

use App\Helpers\Languages;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReport extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    
    public $model;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($model, $username)
    {
        Languages::localizeApp($model->language);
        
        $this->username = $username;
        
        $this->model = $model;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('email.your_order'))->markdown('emails.order-report');
    }
}
