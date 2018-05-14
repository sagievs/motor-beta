<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $products)
    {
        $this->order = $order;

        $this->products = $products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заказ товара с сайта Motor-m.kz')
                    ->from('sitename@example.com')
                    ->markdown('emails.order');
    }
}
