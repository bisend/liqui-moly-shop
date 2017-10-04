<?php

namespace App\Mail;

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
        return $this->markdown('emails.buy-one-click');
    }
}
