<?php

namespace App\Mail;

use App\Models\InscricaoExpedicao;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaInscricaoExpedicao extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * inscricaoExpedicao.
     *
     * @var mixed
     */
    public $inscricao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(InscricaoExpedicao $inscricao)
    {
        $this->inscricao = $inscricao;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(env('EMAIL_DESTINO_INSCRICAO_EXPEDICAO'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Nova inscrição na expedição '.$this->inscricao->expedicao->titulo)
            ->view('emails.inscricao-expedicao');
    }
}
