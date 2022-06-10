<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CotacaoPasseio",
 *      required={"destino", "data_ida", "data_volta", "nome_completo", "email", "telefone"},
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
 *          property="passeios_interesses",
 *          description="passeios_interesses",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="solicitacoes",
 *          description="solicitacoes",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="preco_desejado",
 *          description="preco_desejado",
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
class CotacaoPasseio extends Model
{
    use SoftDeletes;

    public $table = 'cotacao_passeios';

    /**
     * The attributes that should be treated as \Carbon\Carbon instances.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'destino',
        'data_ida',
        'data_volta',
        'qnt_adultos',
        'qnt_criancas',
        'qnt_bebes',
        'passeios_interesses',
        'solicitacoes',
        'preco_desejado',
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
        'destino' => 'string',
        'data_ida' => 'date',
        'data_volta' => 'date',
        'qnt_adultos' => 'integer',
        'qnt_criancas' => 'integer',
        'qnt_bebes' => 'integer',
        'passeios_interesses' => 'string',
        'solicitacoes' => 'string',
        'preco_desejado' => 'float',
        'nome_completo' => 'string',
        'nome_preferencia' => 'string',
        'email' => 'string',
        'telefone' => 'string',
    ];

    /**
     * Mutator para preco_desejado, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setPrecoDesejadoAttribute($value)
    {
        $valorLimpo = str_replace([' ', 'R$'], '', $value);
        $this->attributes['preco_desejado'] = $valorLimpo;
    }

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'destino' => 'required',
        'data_ida' => 'required',
        'data_volta' => 'required',
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
     * getDataVoltaAttribute.
     *
     * @return string
     */
    public function getDataVoltaAttribute($value)
    {
        $dt = new \Carbon\Carbon($value);

        return  $dt->format('d/m/Y');
    }

    /**
     * Mutator para passeios_interesses, modificando antes de inserir no BD.
     *
     * @param  mixed  $value
     */
    public function setPasseiosInteressesAttribute($value)
    {
        $valorFinal = is_array($value) ? implode(', ', array_keys($value)) : $value;
        $this->attributes['passeios_interesses'] = $valorFinal;
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
