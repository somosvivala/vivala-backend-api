<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CotacaoRodoviario",
 *      required={"origem", "destino", "data_ida", "qnt_passageiros", "nome_completo", "email", "telefone"},
 *      @SWG\Property(
 *          property="origem",
 *          description="origem",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="destino",
 *          description="destino",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="data_ida",
 *          description="data_ida",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="data_volta",
 *          description="data_volta",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="sem_volta",
 *          description="sem_volta",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="datas_flexiveis",
 *          description="datas_flexiveis",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="qnt_passageiros",
 *          description="qnt_passageiros",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="hora_ida",
 *          description="hora_ida",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="hora_volta",
 *          description="hora_volta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="companias_preferenciais",
 *          description="companias_preferenciais",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="duracao_maxima",
 *          description="duracao_maxima",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="solicitacoes",
 *          description="solicitacoes",
 *          type="string"
 *      ),
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
 *          )
 * )
 */
class CotacaoRodoviario extends Model
{
    use SoftDeletes;

    public $table = 'cotacao_rodoviarios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'origem',
        'destino',
        'data_ida',
        'data_volta',
        'sem_volta',
        'datas_flexiveis',
        'qnt_passageiros',
        'hora_ida',
        'hora_volta',
        'companias_preferenciais',
        'duracao_maxima',
        'solicitacoes',
        'nome_completo',
        'nome_preferencia',
        'email',
        'telefone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'origem' => 'string',
        'destino' => 'string',
        'data_ida' => 'date',
        'data_volta' => 'date',
        'sem_volta' => 'boolean',
        'datas_flexiveis' => 'boolean',
        'qnt_passageiros' => 'integer',
        'hora_ida' => 'string',
        'hora_volta' => 'string',
        'companias_preferenciais' => 'string',
        'duracao_maxima' => 'string',
        'solicitacoes' => 'string',
        'nome_completo' => 'string',
        'nome_preferencia' => 'string',
        'email' => 'string',
        'telefone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'origem' => 'required',
        'destino' => 'required',
        'data_ida' => 'required',
        'qnt_passageiros' => 'required|integer',
        'nome_completo' => 'required',
        'email' => 'required|email',
        'telefone' => 'required'
    ];

    
}