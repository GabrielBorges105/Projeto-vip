<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newVipMail extends Mailable
{
    use Queueable, SerializesModels;

    private $pedido;
    public function __construct(Pedido  $pedido)
    {
        $this->pedido = $pedido;
    }

    public function build()
    {
        $this->subject('Pedido #'.$this->pedido->id);
        $this->to($this->pedido->cliente->email, $this->pedido->cliente->nome);
        return $this->view('bodyMail', [
            'pedido' => $this->pedido,
        ]);
    }
}
