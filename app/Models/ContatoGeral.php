<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContatoGeral",
 *      required={""},
 *      @SWG\Property(
 *          property="nome_completo",
 *          description="nome_completo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nome_preferencia",
 *          description="nome_preferencia",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mensagem",
 *          description="mensagem",
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
class ContatoGeral extends Model
{
    use SoftDeletes;

    public $table = 'contato_gerals';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome_completo',
        'nome_preferencia',
        'email',
        'mensagem',
        'telefone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome_completo' => 'string',
        'nome_preferencia' => 'string',
        'email' => 'string',
        'mensagem' => 'string',
        'telefone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome_completo' => 'required|string',
        'nome_preferencia' => 'sometimes|nullable|string',
        'mensagem' => 'sometimes|nullable|string',
        'email' => 'required|email',
        'telefone' => 'required|string'
    ];

    
}
