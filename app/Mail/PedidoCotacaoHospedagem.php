<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\CotacaoHospedagem;
use Illuminate\Queue\SerializesModels;

class PedidoCotacaoHospedagem extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * cotacao - Instancia de CotacaoHospedagem.
     *
     * @var App\Models\CotacaoHospedagem
     */
    public $cotacao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CotacaoHospedagem $cotacao)
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
        return $this->to(env('EMAIL_DESTINO_COTACAO_HOSPEDAGEM'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Novo Pedido de cotação de Hospedagem!')
            ->view('emails.cotacao-hospedagem');
    }
}
