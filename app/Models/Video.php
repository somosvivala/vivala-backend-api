<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Video",
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
 *          property="url",
 *          description="url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="partial_url",
 *          description="partial_url",
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
class Video extends Model
{
    use SoftDeletes;

    public $table = 'videos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'ordem', 'nome', 'url', 'partial_url',
        'owner_id',
        'owner_type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'url' => 'string',
        'partial_url' => 'string',
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

    public $hidden = [
        'id',
        'url',
        'created_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'nome',
        'owner_id',
        'owner_type',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['type'];

    public function getTypeAttribute()
    {
        return 'video';
    }

    /**
     * Relação polimorfica para que um video
     * possa pertencer a um mais de 1 tipo de entidade na mesma relacao.
     */
    public function owner()
    {
        return $this->morphTo();
    }
}
