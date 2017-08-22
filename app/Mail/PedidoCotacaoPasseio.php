<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\CotacaoPasseio;
use Illuminate\Queue\SerializesModels;

class PedidoCotacaoPasseio extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * cotacao - Instancia de CotacaoPasseio.
     *
     * @var App\Models\CotacaoPasseio
     */
    public $cotacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CotacaoPasseio $cotacao)
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
        return $this->to(env('EMAIL_DESTINO_COTACAO_PASSEIO'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Novo Pedido de cotação de Passeio!')
            ->view('emails.cotacao-passeio');
    }
}
