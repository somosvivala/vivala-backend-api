<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Foto",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="image_name",
 *          description="image_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="image_path",
 *          description="image_path",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="image_extension",
 *          description="image_extension",
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
class Foto extends Model
{
    use SoftDeletes;

    public $table = 'fotos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'ordem',
        'cloudinary_id',
        'image_name',
        'image_path',
        'image_extension',
        'owner_id',
        'owner_type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cloudinary_id' => 'string',
        'image_name' => 'string',
        'image_path' => 'string',
        'image_extension' => 'string',
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
        'url',
        'created_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'image_name',
        'image_path',
        'image_extension',
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
        return 'photo';
    }

    /**
     * Binding Model Events.
     *
     * OBS: Os Model Events só são disparados quando o trigger parte de uma instancia
     * do Model. Se partimos de outro model e modificarmos a relação o evento nao é disparado
     * Ex: App\Models\Photo $photo - $photo->delete() - Dispara o evento ao deletar
     * Ex: App\Models\Experiencia $user - $user->fotoListagem->delete() - Dispara o evento ao deletar
     * Ex: App\Models\Experiencia $user - $user->fotoListagem()->delete() - Não dispara o evento pois estamos na camada do SQL (Query Buider)
     */
    public static function boot()
    {
        parent::boot();

        /** Binding the delete model event to destroy the filesystem archive **/
        static::deleted(function ($photo) {
            \File::delete(public_path().'/uploads/'.$photo->image_name.'.'.$photo->image_extension);
        });
    }

    /**
     * Relação polimorfica para que uma foto
     * possa pertencer a um mais de 1 tipo de entidade.
     */
    public function owner()
    {
        return $this->morphTo();
    }

    /**********************
     * Acessors / Mutators
     ************************/

    /**
     * Definindo um acessor para a URL da foto.
     */
    public function getURLAttribute()
    {
        return url('/uploads/'.$this->image_name.'.'.$this->image_extension);
    }

    /**
     * Definindo um acessor para o fullpath da foto.
     */
    public function getFullPathAttribute()
    {
        return $this->image_path.$this->image_name.'.'.$this->image_extension;
    }

    /**
     * Relacao polimorfica para a foto de destaque (deprecated).
     */
    public function destaque()
    {
        return $this->morphOne(App\Models\Expedicao::class, 'media_listagem');
    }

    /**
     * Acessor para a URL do Cloudinary.
     */
    public function getUrlCloudinaryAttribute()
    {
        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $id = $this->cloudinary_id;

        return "https://res.cloudinary.com/$cloudName/image/upload/f_webp/$id";
    }
}
