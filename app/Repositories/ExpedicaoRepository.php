<?php

namespace App\Repositories;

use App\Models\Expedicao;
use InfyOm\Generator\Common\BaseRepository;
use App\Traits\ExpedicaoExperienciaRepositoryTrait;

class ExpedicaoRepository extends BaseRepository
{
    use ExpedicaoExperienciaRepositoryTrait;

    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Expedicao::class;
    }
}
