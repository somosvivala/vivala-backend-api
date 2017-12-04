<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ExpedicaoExperienciaModelTrait;

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
    use ExpedicaoExperienciaModelTrait;

    public $table = 'expedicaos';

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
        'url_pagamento' => 'sometimes|nullable|url',

    ];

    /**
     * Relacao de hasMany de Inscricoes.
     */
    public function inscricoes()
    {
        return $this->hasMany(\App\Models\InscricaoExpedicao::class);
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
}
