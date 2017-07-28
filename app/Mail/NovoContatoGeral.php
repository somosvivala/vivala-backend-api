<?php

namespace App\Mail;

use App\Models\ContatoGeral;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoContatoGeral extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * contatoGeral.
     *
     * @var mixed
     */
    public $contatoGeral;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContatoGeral $contato)
    {
        $this->contatoGeral = $contato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(env('EMAIL_DESTINO_CONTATO_GERAL'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Contato pelo formulário geral!')
            ->view('emails.contato-geral');
    }
}
