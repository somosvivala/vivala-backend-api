<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CotacaoHospedagem",
 *      required={"hotel_ou_regiao", "data_ida", "qnt_adultos", "qnt_criancas", "qnt_bebes", "qnt_quartos", "nome_completo", "email", "telefone"},
 *      @SWG\Property(
 *          property="hotel_ou_regiao",
 *          description="hotel_ou_regiao",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="data_ida",
 *          description="data_ida",
 *          type="string"
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
 *          property="tipo_quarto",
 *          description="tipo_quarto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="qnt_quartos",
 *          description="qnt_quartos",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="hospedagem_servicos",
 *          description="hospedagem_servicos",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="hospedagem_tipo",
 *          description="hospedagem_tipo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="hospedagem_solicitacoes",
 *          description="hospedagem_solicitacoes",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="hospedagem_preco_desejado",
 *          description="hospedagem_preco_desejado",
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
class CotacaoHospedagem extends Model
{
    use SoftDeletes;

    public $table = 'cotacao_hospedagems';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'hotel_ou_regiao',
        'data_ida',
        'data_volta',
        'qnt_adultos',
        'qnt_criancas',
        'qnt_bebes',
        'tipo_quarto',
        'qnt_quartos',
        'hospedagem_servicos',
        'hospedagem_tipo',
        'hospedagem_solicitacoes',
        'hospedagem_preco_desejado',
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
        'hotel_ou_regiao' => 'string',
        'data_ida' => 'datetime',
        'data_volta' => 'datetime',
        'qnt_adultos' => 'integer',
        'qnt_criancas' => 'integer',
        'qnt_bebes' => 'integer',
        'tipo_quarto' => 'string',
        'qnt_quartos' => 'integer',
        'hospedagem_servicos' => 'string',
        'hospedagem_tipo' => 'string',
        'hospedagem_solicitacoes' => 'string',
        'hospedagem_preco_desejado' => 'float',
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
        'hotel_ou_regiao' => 'required',
        'data_ida' => 'required',
        'qnt_adultos' => 'required|integer',
        'qnt_criancas' => 'required|integer',
        'qnt_bebes' => 'required|integer',
        'qnt_quartos' => 'required',
        'nome_completo' => 'required',
        'email' => 'required|email',
        'telefone' => 'required'
    ];

    
}
