<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContatoCorporativo",
 *      required={"nome_contato", "email", "mensagem"},
 *      @SWG\Property(
 *          property="nome_contato",
 *          description="nome_contato",
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
 *          property="nome_empresa",
 *          description="nome_empresa",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numero_funcionarios",
 *          description="numero_funcionarios",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="mensagem",
 *          description="mensagem",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class ContatoCorporativo extends Model
{
    use SoftDeletes;

    public $table = 'contato_corporativos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome_contato',
        'email',
        'telefone',
        'nome_empresa',
        'numero_funcionarios',
        'mensagem'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome_contato' => 'string',
        'email' => 'string',
        'telefone' => 'string',
        'nome_empresa' => 'string',
        'numero_funcionarios' => 'integer',
        'mensagem' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome_contato' => 'required|string',
        'mensagem' => 'required|string',
        'email' => 'required|email'
    ];

    
}
