<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InscricaoExperiencia",
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
class InscricaoExperiencia extends Model
{
    use SoftDeletes;

    public $table = 'inscricao_experiencias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'email',
        'telefone',
        'cod_status',
        'nome_status',
        'experiencia_id',
        'created_at'
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
        'experiencia_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string',
        'email' => 'required|email',
        'telefone' => 'required|string'
    ];

    /**
     * Relacao de pertencimento com Experiencia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function experiencia()
    {
        return $this->belongsTo(\App\Models\Experiencia::class, 'experiencia_id', 'id');
    }
}
