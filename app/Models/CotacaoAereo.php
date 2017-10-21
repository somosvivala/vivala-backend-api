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
 *          property="aeroporto_destino",
 *          description="aeroporto_destino",
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
        'aeroporto_destino',
        'companias_aereas_preferenciais',
        'numero_paradas',
        'tempo_voo',
        'aereo_preco_desejado',
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
        'aeroporto_destino' => 'string',
        'companias_aereas_preferenciais' => 'string',
        'numero_paradas' => 'integer',
        'tempo_voo' => 'string',
        'aereo_preco_desejado' => 'float',
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
        'origem' => 'required',
        'destino' => 'required',
        'data_ida' => 'required',
        'nome_completo' => 'required',
        'email' => 'required|email',
    ];

    /**
     * Mutator para data_ida, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setDataIdaAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_ida'] = $cb->format('Y-m-d');
    }

    /**
     * Mutator para data_volta, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setDataVoltaAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_volta'] = $cb->format('Y-m-d');
    }

    /**
     * Mutator para periodo_voo_ida, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setPeriodoVooIdaAttribute($value)
    {
        $this->attributes['periodo_voo_ida'] = is_array($value) ? $value['label'] : $value;
    }

    /**
     * Mutator para periodo_voo_volta, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setPeriodoVooVoltaAttribute($value)
    {
        $this->attributes['periodo_voo_volta'] = is_array($value) ? $value['label'] : $value;
    }

    /**
     * Mutator para numero_paradas, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setNumeroParadasAttribute($value)
    {
        $this->attributes['numero_paradas'] = is_array($value) ? $value['value'] : $value;
    }


    /**
     * Mutator para aereo_preco_desejado, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setAereoPrecoDesejadoAttribute($value)
    {
        $valorLimpo = str_replace([' ', 'R$'], '', $value);
        $this->attributes['aereo_preco_desejado'] = $valorLimpo;
    }

    /**
     * Mutator para hospedagem_preco_desejado, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setHospedagemPrecoDesejadoAttribute($value)
    {
        $valorLimpo = str_replace([' ', 'R$'], '', $value);
        $this->attributes['hospedagem_preco_desejado'] = $valorLimpo;
    }

    /**
     * Mutator para transporte_interno_preco_desejado, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setTransporteInternoPrecoDesejadoAttribute($value)
    {
        $valorLimpo = str_replace([' ', 'R$'], '', $value);
        $this->attributes['transporte_interno_preco_desejado'] = $valorLimpo;
    }

    /**
     * Mutator para passeios_preco_desejado, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setPasseiosPrecoDesejadoAttribute($value)
    {
        $valorLimpo = str_replace([' ', 'R$'], '', $value);
        $this->attributes['passeios_preco_desejado'] = $valorLimpo;
    }

    /**
     * Mutator para hospedagem_servicos, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setHospedagemServicosAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['hospedagem_servicos'] = $valorFinal;
    }

    /**
     * Mutator para transporte_interno, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setTransporteInternoAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['transporte_interno'] = $valorFinal;
    }

    /**
     * Mutator para tipos_transfer, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setTiposTransferAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['tipos_transfer'] = $valorFinal;
    }

    /**
     * Mutator para categorias_carro, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setCategoriasCarroAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['categorias_carro'] = $valorFinal;
    }

    /**
     * Mutator para itens_carro, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setItensCarroAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['itens_carro'] = $valorFinal;
    }

    /**
     * Mutator para passeios_interesses, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setPasseiosInteressesAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['passeios_interesses'] = $valorFinal;
    }

    /**
     * Mutator para nomes_seguro_viagem, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setNomesSeguroViagemAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['nomes_seguro_viagem'] = $valorFinal;
    }

    /**
     * Mutator para datas_nascimento_seguro_viagem, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setDatasSeguroViagemAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', $value) : $value;
        $this->attributes['datas_nascimento_seguro_viagem'] = $valorFinal;
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


    /**
     * getDataIdaAttribute.
     *
     * @return string
     */
    public function getDataIdaAttribute($value)
    {
        $dt = new \Carbon\Carbon($value);
        return  $dt->format('d/m/Y') ;
    }

    /**
     * getDataIdaAttribute.
     *
     * @return string
     */
    public function getDataVoltaAttribute($value)
    {
        $dt = new \Carbon\Carbon($value);
        return  $dt->format('d/m/Y') ;
    }


}
