<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\ContatoAgente;

class ContatoAgenteCriado extends Mailable
{
    use Queueable, SerializesModels;

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
        return $this->to(env('EMAIL_DESTINO_CONTATOS'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Novo contato pelo formulário de agentes!')
            ->view('emails.contato-agente');
    }
}
