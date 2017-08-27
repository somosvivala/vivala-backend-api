<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Expedicao",
 *      required={""},
 *      @SWG\Property(
 *          property="titulo",
 *          description="titulo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descricao_listagem",
 *          description="descricao_listagem",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="data_inicio",
 *          description="data_inicio",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="data_fim",
 *          description="data_fim",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class Expedicao extends Model
{
    use SoftDeletes;

    public $table = 'expedicaos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'titulo',
        'descricao_listagem',
        'data_inicio',
        'data_fim',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'descricao_listagem' => 'string',
        'data_inicio' => 'date',
        'data_fim' => 'date',
        'media_listagem_id' => 'integer',
        'media_listagem_type' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Relacao de hasMany de Inscricoes.
     */
    public function inscricoes()
    {
        return $this->hasMany(\App\Models\InscricaoExpedicao::class);
    }

    /**
     * Uma Expedicao possi N blocos de descricao.
     */
    public function blocosDescricao()
    {
        return $this->morphMany(\App\Models\BlocoDescricao::class, 'owner');
    }

    /**
     * Uma Expedicao possui 1 foto que aparece na listagem.
     */
    public function mediaListagem()
    {
        return $this->morphTo();
    }

    /**
     * Uma Expedicao possui varias fotos.
     */
    public function fotos()
    {
        return $this->morphMany(\App\Models\Foto::class, 'owner');
    }

    /**
     * Uma Expedicao possui varios videos.
     */
    public function videos()
    {
        return $this->morphMany(\App\Models\Video::class, 'owner');
    }

    /**
     * Scope para filtrar as experiencias futuras.
     *
     * @param mixed $query
     */
    public function scopeFuturas($query)
    {
        return $query->where('data_inicio', '>', \Carbon\Carbon::now());
    }

    /**
     * Scope para filtrar as experiencias passadas.
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
            $Media->type = 'video';
            $Media->code = $Media->partial_url;
            unset($Media->partial_url);
            $medias[] = $Media;
        });

        return collect($medias)->sortBy('ordem')->values()->toArray();
    }



    /**
     * Acessor para pegar o titulo transformado sem espacos e com _
     *
     * @return string
     */
    public function getTituloCloudinaryAttribute()
    {
        $semAcentos = $this->tiraAcentos($this->titulo);
        return preg_replace("/[ ,#]/", "_", strtolower($semAcentos));
    }   

    /**
     * tiraAcentos
     *
     * @param mixed $string
     */
    public function tiraAcentos($string) 
    { 
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

}
