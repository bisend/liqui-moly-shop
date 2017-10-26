<?php

namespace App\Mail;

use App\Helpers\Languages;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderReportManager extends Mailable
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
        return $this->subject(trans('email.new_order'))->markdown('emails.order-report-manager');
    }
}
