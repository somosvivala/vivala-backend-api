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
        return $this->hasMany(App\Models\InscricaoExpedicao::class);
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
}
