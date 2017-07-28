<?php

namespace App\Repositories;

use App\Models\ContatoAgente;
use InfyOm\Generator\Common\BaseRepository;

class ContatoAgenteRepository extends BaseRepository
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
        return ContatoAgente::class;
    }
}
