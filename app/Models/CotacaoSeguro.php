<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CotacaoSeguro",
 *      required={"origem", "destino", "data_ida", "data_volta", "nome_completo", "email", "telefone"},
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
 *          property="esportes_radicais",
 *          description="esportes_radicais",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="solicitacoes",
 *          description="solicitacoes",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="datas_nascimento_seguro_viagem",
 *          description="datas_nascimento_seguro_viagem",
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
 *      )
 * )
 */
class CotacaoSeguro extends Model
{
    use SoftDeletes;

    public $table = 'cotacao_seguros';
    

    /**
     * The attributes that should be treated as \Carbon\Carbon instances
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
        'origem',
        'destino',
        'data_ida',
        'data_volta',
        'esportes_radicais',
        'solicitacoes',
        'datas_nascimento_seguro_viagem',
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
        'esportes_radicais' => 'boolean',
        'solicitacoes' => 'string',
        'datas_nascimento_seguro_viagem' => 'string',
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
        'data_volta' => 'required',
        'nome_completo' => 'required',
        'email' => 'required|email',
        'telefone' => 'required'
    ];


    /**
     * Mutator para data_ida, modificando antes de inserir no BD
     *
     * @param mixed $value
     */
    public function setDataIdaAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_ida'] = $cb->format('Y-m-d');
    }

    /**
     * Mutator para data_volta, modificando antes de inserir no BD
     *
     * @param mixed $value
     */
    public function setDataVoltaAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_volta'] = $cb->format('Y-m-d');
    }


    /**
     * Mutator para datas_nascimento_seguro_viagem, modificando antes de inserir no BD
     *
     * @param mixed $value
     */
    public function setDatasNascimentoSeguroViagemAttribute($value)
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
        return $this->data_ida ? $this->data_ida->format('d/m/Y') : '';
    }

    /**
     * getDataVoltaFormatadaAttribute.
     *
     * @return string
     */
    public function getDataVoltaFormatadaAttribute()
    {
        return $this->data_volta ? $this->data_volta->format('d/m/Y') : '';
    }
}
