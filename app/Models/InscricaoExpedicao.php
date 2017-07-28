<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InscricaoExpedicao",
 *      required={""},
 *      @SWG\Property(
 *          property="nome",
 *          description="nome",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefone",
 *          description="telefone",
 *          type="string"
 *      )
 * )
 */
class InscricaoExpedicao extends Model
{
    use SoftDeletes;

    public $table = 'inscricao_expedicaos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'email',
        'telefone',
        'cod_status',
        'nome_status',
        'expedicao_id',
        'created_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'email' => 'string',
        'telefone' => 'string',
        'cod_status' => 'integer',
        'nome_status' => 'string',
        'expedicao_id' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string',
        'email' => 'required|email',
        'telefone' => 'required|string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function expedicao()
    {
        return $this->belongsTo(\App\Models\Expedicao::class, 'expedicao_id', 'id');
    }
}
