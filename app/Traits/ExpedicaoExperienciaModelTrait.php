<?php

namespace App\Traits;

/**
 * Trait: Trait contendo as relacoes, scopes e outros metodos que são compartilhados entre as resources.
 *
 * @see App\Models\Experiencia;
 * @see App\Models\Expedicao;
 */
trait ExpedicaoExperienciaModelTrait
{
    /**
     * Uma Experiencia/Expedicao possi N blocos de descricao.
     */
    public function blocosDescricao()
    {
        return $this->morphMany(\App\Models\BlocoDescricao::class, 'owner');
    }

    /**
     * Uma Experiencia/Expedicao possui 1 foto que aparece na listagem.
     */
    public function mediaListagem()
    {
        return $this->morphTo();
    }

    /**
     * Uma Experiencia/Expedicao possui varias fotos.
     */
    public function fotos()
    {
        return $this->morphMany(\App\Models\Foto::class, 'owner');
    }

    /**
     * Uma Experiencia/Expedicao possui varios videos.
     */
    public function videos()
    {
        return $this->morphMany(\App\Models\Video::class, 'owner');
    }

    /**
     * Scope para filtrar as Experiencias/Expedicoes futuras.
     *
     * @param mixed $query
     */
    public function scopeFuturas($query)
    {
        return $query->where('data_inicio', '>', \Carbon\Carbon::now());
    }

    /**
     * Scope para filtrar as Experiencias/Expedicoes passadas.
     *
     * @param mixed $query
     */
    public function scopePassadas($query)
    {
        return $query->where('data_inicio', '<', \Carbon\Carbon::now());
    }

    /**
     * Acessor para determinar se as inscricoes estao abertas (Data inicio está no futuro).
     */
    public function getInscricoesAbertasAttribute()
    {
        return $this->data_inicio->isFuture();
    }

    /**
     * Acessor para pegar todas as medias do slider na ordem correta.
     */
    public function getMediasSliderAttribute()
    {
        $fotos = $this->fotos;
        $videos = $this->videos;

        $medias = [];

        $fotos->each(function ($Media) use (&$medias) {
            $Media->type = 'photo';
            $Media->code = $Media->cloudinary_id;
            unset($Media->cloudinary_id);

            $medias[] = $Media;
        });

        $videos->each(function ($Media) use (&$medias) {
            $Media->id = $Media->id;
            $Media->type = 'video';
            $Media->code = $Media->partial_url;
            unset($Media->partial_url);
            $medias[] = $Media;
        });

        return collect($medias)->sortBy('ordem')->values()->toArray();
    }

    /**
     * Acessor para pegar o titulo transformado sem espacos e com _.
     *
     * @return string
     */
    public function getTituloCloudinaryAttribute()
    {
        $semAcentos = str_slug($this->titulo);

        return preg_replace('/[ ,#]/', '_', strtolower($semAcentos));
    }

    /**
     * tiraAcentos.
     *
     * @param mixed $string
     */
    public function tiraAcentos($string)
    {
        return preg_replace(['/(á|à|ã|â|ä)/', '/(Á|À|Ã|Â|Ä)/', '/(é|è|ê|ë)/', '/(É|È|Ê|Ë)/', '/(í|ì|î|ï)/', '/(Í|Ì|Î|Ï)/', '/(ó|ò|õ|ô|ö)/', '/(Ó|Ò|Õ|Ô|Ö)/', '/(ú|ù|û|ü)/', '/(Ú|Ù|Û|Ü)/', '/(ñ)/', '/(Ñ)/'], explode(' ', 'a A e E i I o O u U n N'), $string);
    }
}
