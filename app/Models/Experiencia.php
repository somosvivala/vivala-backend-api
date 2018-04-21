<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ExpedicaoExperienciaModelTrait;

/**
 * @SWG\Definition(
 *      definition="Experiencia",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
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
 *      ),
 *      @SWG\Property(
 *          property="media_listagem_id",
 *          description="media_listagem_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="media_listagem_type",
 *          description="media_listagem_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Experiencia extends Model
{
    use SoftDeletes;
    use ExpedicaoExperienciaModelTrait;

    public $table = 'experiencias';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'titulo',
        'descricao_listagem',
        'ativo_listagem',
        'data_inicio',
        'data_fim',
        'url_pagamento',
        'link_destino',
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
        'url_pagamento' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'link_destino' => 'required|url',
    ];

    /** Atributos que devem ser inclusos nas respostas da API **/
    public $appends = [
        'stringAtivoListagem',
    ];

    /**
     * Relacao de hasMany de Inscricoes.
     */
    public function inscricoes()
    {
        return $this->hasMany(\App\Models\InscricaoExperiencia::class);
    }

    /**
     * Scope para aplicar na query filtrando por.
     */
    public function scopeAtivas($query)
    {
        return $query->where('ativo_listagem', true);
    }

    /**
     * Acessor para tratar o link de pagamento.
     */
    public function getUrlPagamentoAttribute()
    {
        return $this->attributes['url_pagamento']
            ? $this->attributes['url_pagamento']
            : false;
    }

    /**
     * Acessor para o texto de 'Sim' ou 'Não' dependendo da propriedade $ativo_listagem.
     */
    public function getstringAtivoListagemAttribute()
    {
        return $this->ativo_listagem ? 'Sim' : 'Não';
    }

    /**
     * Acessor para o link da foto de listagem no cloudinary.
     */
    public function getFotoLinkAttribute()
    {
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $id = $this->mediaListagem->cloudinary_id;

        return "https://res.cloudinary.com/$cloudName/image/upload/$id";
    }
}
