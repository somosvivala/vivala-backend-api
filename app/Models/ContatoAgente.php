<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContatoAgente",
 *      required={"nome_completo", "email"},
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
class ContatoAgente extends Model
{
    use SoftDeletes;

    public $table = 'contato_agentes';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome_completo',
        'nome_preferencia',
        'email',
        'telefone',
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
        'telefone' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome_completo' => 'required',
        'email' => 'required|email',
    ];
}
