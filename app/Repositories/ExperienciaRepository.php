<?php

namespace App\Repositories;

use App\Models\Experiencia;
use InfyOm\Generator\Common\BaseRepository;
use App\Traits\ExpedicaoExperienciaRepositoryTrait;

class ExperienciaRepository extends BaseRepository
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
        return Experiencia::class;
    }
}
