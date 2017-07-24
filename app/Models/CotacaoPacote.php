<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CotacaoPacote",
 *      required={"origem", "destino", "data_ida", "qnt_adultos", "qnt_criancas", "qnt_bebes", "periodo_voo_ida", "periodo_voo_volta", "contato_nome_completo", "contato_email", "contato_telefone"},
 *      @SWG\Property(
 *          property="origem",
 *          description="origem",
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
 *          property="destino",
 *          description="destino",
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
 *          property="hotel_ou_regiao",
 *          description="hotel_ou_regiao",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="qnt_quartos",
 *          description="qnt_quartos",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipo_quarto",
 *          description="tipo_quarto",
 *          type="string"
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
 *          property="transporte_interno",
 *          description="transporte_interno",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipos_transfer",
 *          description="tipos_transfer",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="categorias_carro",
 *          description="categorias_carro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="itens_carro",
 *          description="itens_carro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="transporte_interno_solicitacoes",
 *          description="transporte_interno_solicitacoes",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="transporte_interno_preco_desejado",
 *          description="transporte_interno_preco_desejado",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="passeios_interesses",
 *          description="passeios_interesses",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="passeios_outros",
 *          description="passeios_outros",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="passeios_preco_desejado",
 *          description="passeios_preco_desejado",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="nomes_seguro_viagem",
 *          description="nomes_seguro_viagem",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="datas_nascimento_seguro_viagem",
 *          description="datas_nascimento_seguro_viagem",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contato_nome_completo",
 *          description="contato_nome_completo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contato_nome_preferencia",
 *          description="contato_nome_preferencia",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contato_email",
 *          description="contato_email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="contato_telefone",
 *          description="contato_telefone",
 *          type="string"
 *      )
 * )
 */
class CotacaoPacote extends Model
{
    use SoftDeletes;

    public $table = 'cotacao_pacotes';
    

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
        'hotel_ou_regiao',
        'qnt_quartos',
        'tipo_quarto',
        'hospedagem_servicos',
        'hospedagem_tipo',
        'hospedagem_solicitacoes',
        'hospedagem_preco_desejado',
        'transporte_interno',
        'tipos_transfer',
        'categorias_carro',
        'itens_carro',
        'transporte_interno_solicitacoes',
        'transporte_interno_preco_desejado',
        'passeios_interesses',
        'passeios_outros',
        'passeios_preco_desejado',
        'nomes_seguro_viagem',
        'datas_nascimento_seguro_viagem',
        'contato_nome_completo',
        'contato_nome_preferencia',
        'contato_email',
        'contato_telefone'
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
        'hotel_ou_regiao' => 'string',
        'qnt_quartos' => 'integer',
        'tipo_quarto' => 'string',
        'hospedagem_servicos' => 'string',
        'hospedagem_tipo' => 'string',
        'hospedagem_solicitacoes' => 'string',
        'hospedagem_preco_desejado' => 'float',
        'transporte_interno' => 'integer',
        'tipos_transfer' => 'integer',
        'categorias_carro' => 'string',
        'itens_carro' => 'string',
        'transporte_interno_solicitacoes' => 'string',
        'transporte_interno_preco_desejado' => 'float',
        'passeios_interesses' => 'string',
        'passeios_outros' => 'string',
        'passeios_preco_desejado' => 'float',
        'nomes_seguro_viagem' => 'string',
        'datas_nascimento_seguro_viagem' => 'string',
        'contato_nome_completo' => 'string',
        'contato_nome_preferencia' => 'string',
        'contato_email' => 'string',
        'contato_telefone' => 'string'
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
        'data_volta' => 'required',
        'qnt_adultos' => 'required|integer',
        'qnt_criancas' => 'required|integer',
        'qnt_bebes' => 'required|integer',
        'periodo_voo_ida' => 'required',
        'periodo_voo_volta' => 'required',
        'contato_nome_completo' => 'required',
        'contato_email' => 'required|email',
        'contato_telefone' => 'required'
    ];

    
}
