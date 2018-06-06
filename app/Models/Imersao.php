<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ExpedicaoExperienciaModelTrait;

/**
 * @SWG\Definition(
 *      definition="Imersao",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="titulo",
 *          description="titulo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="media_listagem_id",
 *          description="media_listagem_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="media_listagem_type",
 *          description="media_listagem_type",
 *          type="string"
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
class Imersao extends Model
{
    use SoftDeletes;
    use ExpedicaoExperienciaModelTrait;

    public $table = 'imersaos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'ordem',
        'titulo',
        'ativo_listagem',
        'link_destino',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'media_listagem_id' => 'integer',
        'media_listagem_type' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'required',
        'link_destino' => 'required|url',
    ];

    /** Atributos que devem ser inclusos nas respostas da API **/
    public $appends = [
        'stringAtivoListagem',
    ];

    /**
     * Scope para aplicar na query filtrando por.
     */
    public function scopeAtivas($query)
    {
        return $query->where('ativo_listagem', true);
    }

    /**
     * Acessor para o texto de 'Sim' ou 'Não' dependendo da propriedade $ativo_listagem.
     */
    public function getStringAtivoListagemAttribute()
    {
        return $this->ativo_listagem ? 'Sim' : 'Não';
    }

    /**
     * Acessor para o link da foto de listagem no cloudinary.
     */
    public function getFotoLinkAttribute()
    {
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $id = $this->mediaListagem->cloudinary_id;

        return "https://res.cloudinary.com/$cloudName/image/upload/$id";
    }
}
