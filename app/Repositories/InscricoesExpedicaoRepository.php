<?php

namespace App\Repositories;

use App\Models\InscricoesExpedicao;
use InfyOm\Generator\Common\BaseRepository;

class InscricoesExpedicaoRepository extends BaseRepository
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
        return InscricoesExpedicao::class;
    }
}
