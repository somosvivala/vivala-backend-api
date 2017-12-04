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
        'data_inicio',
        'data_fim',
        'url_pagamento',
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
        'descricao_listagem' => 'required',
        'data_inicio' => 'required',
        'data_fim' => 'required',
    ];

    /**
     * Relacao de hasMany de Inscricoes.
     */
    public function inscricoes()
    {
        return $this->hasMany(\App\Models\InscricaoExperiencia::class);
    }

    /**
     * Acessor para tratar o link de pagamento
     */
    public function getUrlPagamentoAttribute() 
    {
        return $this->attributes['url_pagamento'] 
            ? $this->attributes['url_pagamento'] 
            : false;
    }
}
