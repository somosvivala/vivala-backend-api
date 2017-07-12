<?php

namespace App\Mail;

use App\Models\ContatoCorporativo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoContatoCorporativo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * contatoCorporativo
     *
     * @var mixed
     */
    public $contatoCorporativo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContatoCorporativo $contato)
    {
        $this->contatoCorporativo = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(env('EMAIL_DESTINO_CONTATO_CORPORATIVO'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Contato pelo formulário corporativo!')
            ->view('emails.contato-corporativo');
    }
}
