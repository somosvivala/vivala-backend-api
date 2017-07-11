<?php

namespace App\Repositories;

use App\Models\ContatoCorporativo;
use InfyOm\Generator\Common\BaseRepository;

class ContatoCorporativoRepository extends BaseRepository
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
        return ContatoCorporativo::class;
    }
}
