<?php

namespace App\Repositories;

use App\Models\CotacaoAereo;
use InfyOm\Generator\Common\BaseRepository;

class CotacaoAereoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origem',
        'destino',
        'data_ida',
        'data_volta',
        'datas_flexiveis',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return CotacaoAereo::class;
    }
}
