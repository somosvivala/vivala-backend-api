<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CotacaoAereo",
 *      required={"origem", "destino", "data_ida", "qnt_adultos", "qnt_criancas", "qnt_bebes", "periodo_voo_ida", "nome_completo", "email", "telefone"},
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
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="data_volta",
 *          description="data_volta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="datas_flexiveis",
 *          description="datas_flexiveis",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="qnt_adultos",
 *          description="qnt_adultos",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qnt_criancas",
 *          description="qnt_criancas",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="qnt_bebes",
 *          description="qnt_bebes",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="periodo_voo_ida",
 *          description="periodo_voo_ida",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="periodo_voo_volta",
 *          description="periodo_voo_volta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="aeroporto_origem",
 *          description="aeroporto_origem",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="aeroporto_retorno",
 *          description="aeroporto_retorno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="companias_aereas_preferenciais",
 *          description="companias_aereas_preferenciais",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numero_paradas",
 *          description="numero_paradas",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tempo_voo",
 *          description="tempo_voo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="aereo_preco_desejado",
 *          description="aereo_preco_desejado",
 *          type="number",
 *          format="float"
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
 *      )
 * )
 */
class CotacaoAereo extends Model
{
    use SoftDeletes;

    public $table = 'cotacao_aereos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'origem',
        'destino',
        'data_ida',
        'data_volta',
        'datas_flexiveis',
        'qnt_adultos',
        'qnt_criancas',
        'qnt_bebes',
        'periodo_voo_ida',
        'periodo_voo_volta',
        'aeroporto_origem',
        'aeroporto_retorno',
        'companias_aereas_preferenciais',
        'numero_paradas',
        'tempo_voo',
        'aereo_preco_desejado',
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
        'data_ida' => 'datetime',
        'data_volta' => 'datetime',
        'datas_flexiveis' => 'boolean',
        'qnt_adultos' => 'integer',
        'qnt_criancas' => 'integer',
        'qnt_bebes' => 'integer',
        'periodo_voo_ida' => 'string',
        'periodo_voo_volta' => 'string',
        'aeroporto_origem' => 'string',
        'aeroporto_retorno' => 'string',
        'companias_aereas_preferenciais' => 'string',
        'numero_paradas' => 'integer',
        'tempo_voo' => 'string',
        'aereo_preco_desejado' => 'float',
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
        'qnt_adultos' => 'required|integer',
        'periodo_voo_ida' => 'required',
        'nome_completo' => 'required',
        'email' => 'required|email',
        'telefone' => 'required'
    ];

    
}
