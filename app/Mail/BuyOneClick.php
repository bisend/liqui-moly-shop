<?php

namespace App\Mail;

use App\Helpers\Languages;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuyOneClick extends Mailable
{
    use Queueable, SerializesModels;
    
    public $product;
    
    public $fastOrder;
    
    public $language;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product, $fastOrder, $language)
    {
        Languages::localizeApp($language);

        $this->product = $product;
        
        $this->fastOrder = $fastOrder;
        
        $this->language = $language;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('email.new_fast_order'))->markdown('emails.buy-one-click');
    }
}
