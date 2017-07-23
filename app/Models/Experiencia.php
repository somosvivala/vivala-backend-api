<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public $table = 'experiencias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'titulo',
        'descricao_listagem',
        'data_inicio',
        'data_fim'
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
        'media_listagem_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * Relacao de hasMany de Inscricoes
     *
     */
    public function inscricoes() 
    {
        return $this->hasMany(App\Models\InscricaoExperiencia::class);
    }

    /**
     * Uma Experiencia possi varios blocos de descricao
     */
    public function blocosDescricao()
    {
        return $this->morphMany(\App\Models\BlocoDescricao::class, 'owner');
    }

    /**
     * Uma Experiencia possui 1 foto que aparece na listagem
     */
    public function mediaListagem()
    {
        return $this->morphTo();
    }

    /**
     * Uma Experiencia possui varias fotos
     */
    public function fotos()
    {
        return $this->morphMany(\App\Models\Foto::class, 'owner');
    }
    
    
    
}
