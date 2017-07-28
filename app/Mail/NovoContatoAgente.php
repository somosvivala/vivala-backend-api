<?php

namespace App\Mail;

use App\Models\ContatoAgente;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoContatoAgente extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * contatoAgente.
     *
     * @var mixed
     */
    public $contatoAgente;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContatoAgente $contato)
    {
        $this->contatoAgente = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(env('EMAIL_DESTINO_CONTATO_AGENTES'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Contato pelo formulário de agentes!')
            ->view('emails.contato-agente');
    }
}
