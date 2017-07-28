<?php

namespace App\Repositories;

use App\Models\InscricaoExperiencia;
use InfyOm\Generator\Common\BaseRepository;

class InscricaoExperienciaRepository extends BaseRepository
{
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
        return InscricaoExperiencia::class;
    }
}
