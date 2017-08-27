<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Agente",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nome",
 *          description="nome",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cidade",
 *          description="cidade",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="estado",
 *          description="estado",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="destaque",
 *          description="destaque",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Agente extends Model
{
    use SoftDeletes;

    public $table = 'agentes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'cidade',
        'estado',
        'destaque'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'cidade' => 'string',
        'estado' => 'string',
        'destaque' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
    /**
     * Um Agente possui uma foto.
     */
    public function foto()
    {
        return $this->morphOne(\App\Models\Foto::class, 'owner');
    }

    /**
     * Acessor para pegar o local do agente já formatado
     *
     * @return string
     */
    public function getLocalAttribute()
    {
        return ucwords($this->cidade . ", " . $this->estado);
    }   


    /**
     * Acessor para pegar o o nome transformado sem espacos e com _
     *
     * @return string
     */
    public function getNomeCloudinaryAttribute()
    {
        $semAcentos = $this->tiraAcentos($this->nome);
        return preg_replace("/ /", "_", strtolower($semAcentos));
    }   

    /**
     * tiraAcentos
     *
     * @param mixed $string
     */
    public function tiraAcentos($string) 
    { 
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
}
