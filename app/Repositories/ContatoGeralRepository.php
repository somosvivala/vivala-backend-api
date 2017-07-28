<?php

namespace App\Repositories;

use App\Models\ContatoGeral;
use InfyOm\Generator\Common\BaseRepository;

class ContatoGeralRepository extends BaseRepository
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
        return ContatoGeral::class;
    }
}
