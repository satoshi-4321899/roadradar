<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $cartProducts;
    public $totalAmount;
    public $address;
    public $name;
    public $payment_method;
    public $phone_number;
    
    public function __construct($cartProducts,$totalAmount,$address,$name,$payment_method,$phone_number)
    {
        $this->cartProducts = $cartProducts;
        $this->totalAmount = $totalAmount;
        $this->address = $address;
        $this->name = $name;
        $this->payment_method = $payment_method;
        $this->phone_number = $phone_number;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'ご注文いただきありがとうございました',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_notify',
            with:[
                'cartProducts' => $this->cartProducts,
                'address' => $this->address,
                'name' => $this->name,
                'totalAmount' => $this->totalAmount,
                'payment_method' => $this->payment_method,
                'phone_number' => $this->phone_number,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
