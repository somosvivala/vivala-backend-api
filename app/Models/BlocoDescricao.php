<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="BlocoDescricao",
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
 *          property="texto",
 *          description="texto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="owner_id",
 *          description="owner_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="owner_type",
 *          description="owner_type",
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
class BlocoDescricao extends Model
{
    use SoftDeletes;

    public $table = 'bloco_descricaos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'titulo',
        'texto',
        'owner_id',
        'owner_type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulo' => 'string',
        'texto' => 'string',
        'owner_id' => 'integer',
        'owner_type' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public $hidden = [
        'id',
        'owner_id',
        'owner_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Um bloco de descricao pode pertencer a qualquer outro model (Rel. Polimorfica).
     */
    public function owner()
    {
        return $this->morphTo();
    }
}
