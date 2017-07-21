<?php

namespace App\Repositories;

use App\Models\InscricaoExpedicao;
use InfyOm\Generator\Common\BaseRepository;

class InscricaoExpedicaoRepository extends BaseRepository
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
        return InscricaoExpedicao::class;
    }
}
