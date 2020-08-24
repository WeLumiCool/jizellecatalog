<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class send extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $phone;
    public $city;
    public $products;
    public $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $city , $products, $total)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->city = $city;
        $this->products = $products;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sales@jizelle.ru')->subject('Новая заявка с Каталога!"
')->markdown('mail.send');
    }
}
