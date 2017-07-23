<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InscricaoExperiencia",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
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
 *      ),
 *      @SWG\Property(
 *          property="cod_status",
 *          description="cod_status",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nome_status",
 *          description="nome_status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="experiencia_id",
 *          description="experiencia_id",
 *          type="integer",
 *          format="int32"
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
