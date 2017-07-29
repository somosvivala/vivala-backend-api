<?php

namespace App\Mail;

use App\Models\CotacaoAereo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoCotacaoAereo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * cotacao - Instancia de CotacaoAereo.
     *
     * @var App\Models\CotacaoAereo
     */
    public $cotacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CotacaoAereo $cotacao)
    {
        $this->cotacao = $cotacao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(env('EMAIL_DESTINO_COTACAO_AEREO'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Novo Pedido de cotação de transporte Aéreo!')
            ->view('emails.cotacao-aereo');
    }
}
