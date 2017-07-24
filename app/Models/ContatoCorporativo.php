<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContatoCorporativo",
 *      required={""},
 *      @SWG\Property(
 *          property="nome_completo",
 *          description="nome_completo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mensagem",
 *          description="mensagem",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefone",
 *          description="telefone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nome_empresa",
 *          description="nome_empresa",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numero_funcionarios",
 *          description="numero_funcionarios",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class ContatoCorporativo extends Model
{
    use SoftDeletes;

    public $table = 'contato_corporativos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome_completo',
        'email',
        'telefone',
        'nome_empresa',
        'mensagem',
        'numero_funcionarios'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome_completo' => 'string',
        'email' => 'string',
        'telefone' => 'string',
        'nome_empresa' => 'string',
        'mensagem' => 'string',
        'numero_funcionarios' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome_completo' => 'required|string',
        'email' => 'required|email',
        'telefone' => 'required|string',
        'nome_empresa' => 'required|string',
        'mensagem' => 'sometimes|nullable|string',
        'numero_funcionarios' => 'sometimes|nullable|integer'
    ];

    
}
