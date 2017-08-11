<?php

namespace App\Mail;

use App\Models\CotacaoCruzeiro;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoCotacaoCruzeiro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * cotacao - Instancia de CotacaoCruzeiro.
     *
     * @var App\Models\CotacaoCruzeiro
     */
    public $cotacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CotacaoCruzeiro $cotacao)
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
        return $this->to(env('EMAIL_DESTINO_COTACAO_CRUZEIRO'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Novo Pedido de cotação de Cruzeiro!')
            ->view('emails.cotacao-cruzeiro');
    }
}
