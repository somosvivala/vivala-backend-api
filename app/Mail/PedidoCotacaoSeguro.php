<?php

namespace App\Mail;

use App\Models\CotacaoSeguro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoCotacaoSeguro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * cotacao - Instancia de CotacaoSeguro.
     *
     * @var App\Models\CotacaoSeguro
     */
    public $cotacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CotacaoSeguro $cotacao)
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
        return $this->to(env('EMAIL_DESTINO_COTACAO_SEGURO'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Novo Pedido de cotação de Seguro Viagem!')
            ->view('emails.cotacao-seguro');
    }
}
