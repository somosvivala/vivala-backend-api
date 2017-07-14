<?php

namespace App\Repositories;

use App\Models\Experiencia;
use InfyOm\Generator\Common\BaseRepository;

class ExperienciaRepository extends BaseRepository
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
        return Experiencia::class;
    }
}
