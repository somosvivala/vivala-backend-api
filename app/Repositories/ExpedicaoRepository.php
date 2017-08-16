<?php

namespace App\Repositories;

use App\Models\Expedicao;
use InfyOm\Generator\Common\BaseRepository;

class ExpedicaoRepository extends BaseRepository
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
        return Expedicao::class;
    }
    
    public function getEdicoesFuturas()
    {
        return $this->model->futuras()->get();
    }

    public function getEdicoesPassadas()
    {
        return $this->model->passadas()->get();
    }
    

}
