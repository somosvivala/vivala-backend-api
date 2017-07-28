<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InscricaoNewsletter",
 *      required={"nome", "email"},
 *      @SWG\Property(
 *          property="nome",
 *          description="nome",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      )
 * )
 */
class InscricaoNewsletter extends Model
{
    use SoftDeletes;

    public $table = 'inscricao_newsletters';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nome',
        'email',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'email' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'email' => 'required|email',
    ];
}
