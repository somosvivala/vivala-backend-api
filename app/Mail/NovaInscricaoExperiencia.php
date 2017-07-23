<?php

namespace App\Mail;

use App\Models\InscricaoExperiencia;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaInscricaoExperiencia extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * inscricaoExperiencia
     *
     * @var mixed
     */
    public $inscricao;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(InscricaoExperiencia $inscricao)
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
        return $this->to(env('EMAIL_DESTINO_INSCRICAO_EXPERIENCIA'))
            ->from('contato@vivala.com.br')
            ->subject('[VIVALÁ] Nova inscrição na experiência '.$this->inscricao->experiencia->titulo)
            ->view('emails.inscricao-experiencia');
    }
}
