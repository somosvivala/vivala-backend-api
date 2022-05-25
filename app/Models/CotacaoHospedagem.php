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
 *          property="data_volta",
 *          description="data_volta",
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

    protected $dates = ['deleted_at', 'data_ida', 'data_volta'];

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
        'telefone',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'hotel_ou_regiao' => 'required',
        'data_ida' => 'required',
        'qnt_quartos' => 'required',
        'nome_completo' => 'required',
        'email' => 'required|email',
        'telefone' => 'required',
    ];

    /**
     * Mutator para data_ida, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setDataIdaAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_ida'] = $cb->format('Y-m-d');
    }

    /**
     * Mutator para data_volta, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setDataVoltaAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_volta'] = $cb->format('Y-m-d');
    }

    /**
     * Mutator para periodo_voo_ida, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setPeriodoVooIdaAttribute($value)
    {
        $this->attributes['periodo_voo_ida'] = is_array($value) ? $value['label'] : '';
    }

    /**
     * Mutator para periodo_voo_volta, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setPeriodoVooVoltaAttribute($value)
    {
        $this->attributes['periodo_voo_volta'] = is_array($value) ? $value['label'] : '';
    }

    /**
     * Mutator para tipo_quarto, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setTipoQuartoAttribute($value)
    {
        $this->attributes['tipo_quarto'] = is_array($value) ? $value['label'] : $value;
    }

    /**
     * Mutator para hospedagem_tipo, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setHospedagemTipoAttribute($value)
    {
        $this->attributes['hospedagem_tipo'] = is_array($value) ? $value['label'] : $value;
    }

    /**
     * Mutator para hospedagem_preco_desejado, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setHospedagemPrecoDesejadoAttribute($value)
    {
        $valorLimpo = str_replace([' ', 'R$'], '', $value);
        $this->attributes['hospedagem_preco_desejado'] = $valorLimpo;
    }

    /**
     * Mutator para hospedagem_servicos, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setHospedagemServicosAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', array_values($value)) : $value;
        $this->attributes['hospedagem_servicos'] = $valorFinal;
    }

    /**
     * getDataIdaAttribute.
     *
     * @return string
     */
    public function getDataIdaAttribute($value)
    {
        $dt = new \Carbon\Carbon($value);

        return  $dt->format('d/m/Y');
    }

    /**
     * getDataIdaAttribute.
     *
     * @return string
     */
    public function getDataVoltaAttribute($value)
    {
        $dt = new \Carbon\Carbon($value);

        return  $dt->format('d/m/Y');
    }

    /**
     * getDataIdaFormatadaAttribute.
     *
     * @return string
     */
    public function getDataIdaFormatadaAttribute()
    {
        return $this->data_ida;
    }

    /**
     * getDataVoltaFormatadaAttribute.
     *
     * @return string
     */
    public function getDataVoltaFormatadaAttribute()
    {
        return $this->data_volta;
    }

    /**
     * getTemDatasFlexiveisAttribute.
     *
     * @return string
     */
    public function getTemDatasFlexiveisAttribute()
    {
        return $this->datas_flexiveis ? 'Sim' : 'Não';
    }
}
