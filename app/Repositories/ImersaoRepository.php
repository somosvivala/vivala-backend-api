<?php

namespace App\Repositories;

use App\Models\Imersao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ImersaoRepository
 * @package App\Repositories
 * @version April 20, 2018, 11:39 pm BRT
 *
 * @method Imersao findWithoutFail($id, $columns = ['*'])
 * @method Imersao find($id, $columns = ['*'])
 * @method Imersao first($columns = ['*'])
*/
class ImersaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Imersao::class;
    }
}
