<?php

namespace App\Repositories;

use App\Models\Agente;
use InfyOm\Generator\Common\BaseRepository;

class AgenteRepository extends BaseRepository
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
        return Agente::class;
    }

    public function getAgentesEmDestaque()
    {
        return $this->model->where('destaque', true)->get();
    }
}
