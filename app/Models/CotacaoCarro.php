<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="CotacaoCarro",
 *      required={"cidade_retirada", "cidade_devolucao", "data_retirada", "data_devolucao", "hora_retirada", "hora_devolucao", "nome_completo", "email", "telefone"},
 *      @SWG\Property(
 *          property="cidade_retirada",
 *          description="cidade_retirada",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cidade_devolucao",
 *          description="cidade_devolucao",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="data_retirada",
 *          description="data_retirada",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="data_devolucao",
 *          description="data_devolucao",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="hora_retirada",
 *          description="hora_retirada",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="hora_devolucao",
 *          description="hora_devolucao",
 *          type="string"
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
 *          property="solicitacoes_carro",
 *          description="solicitacoes_carro",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="preco_desejado_carro",
 *          description="preco_desejado_carro",
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
class CotacaoCarro extends Model
{
    use SoftDeletes;

    public $table = 'cotacao_carros';

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
        'cidade_retirada',
        'cidade_devolucao',
        'data_retirada',
        'data_devolucao',
        'hora_retirada',
        'hora_devolucao',
        'categorias_carro',
        'itens_carro',
        'solicitacoes_carro',
        'preco_desejado_carro',
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
        'cidade_retirada' => 'string',
        'cidade_devolucao' => 'string',
        'data_retirada' => 'date',
        'data_devolucao' => 'date',
        'hora_retirada' => 'string',
        'hora_devolucao' => 'string',
        'categorias_carro' => 'string',
        'itens_carro' => 'string',
        'solicitacoes_carro' => 'string',
        'preco_desejado_carro' => 'float',
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
        'cidade_retirada' => 'required',
        'cidade_devolucao' => 'required',
        'data_retirada' => 'required',
        'data_devolucao' => 'required',
        'hora_retirada' => 'required',
        'hora_devolucao' => 'required',
        'nome_completo' => 'required',
        'email' => 'required|email',
        'telefone' => 'required',
    ];

    /**
     * Mutator para data_retirada, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setDataRetiradaAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_retirada'] = $cb->format('Y-m-d');
    }

    /**
     * getDataRetiradaFormatadaAttribute
     *
     */
    public function getDataRetiradaFormatadaAttribute()
    {
        return $this->data_devolucao ? $this->data_devolucao->format('d/m/Y') : '';
    }

    /**
     * getDataDevolucaoFormatadaAttribute
     *
     */
    public function getDataDevolucaoFormatadaAttribute()
    {
        return $this->data_devolucao ? $this->data_devolucao->format('d/m/Y') : '';
    }


    /**
     * Mutator para data_devolucao, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setDataDevolucaoAttribute($value)
    {
        $cb = new \Carbon\Carbon($value);
        $this->attributes['data_devolucao'] = $cb->format('Y-m-d');
    }

    /**
     * Mutator para preco_desejado_carro, modificando antes de inserir no BD.
     *
     * @param mixed $value
     */
    public function setPrecoDesejadoCarroAttribute($value)
    {
        $valorLimpo = str_replace([' ', 'R$'], '', $value);
        $this->attributes['preco_desejado_carro'] = $valorLimpo;
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
}
