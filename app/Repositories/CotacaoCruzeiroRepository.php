<?php

namespace App\Repositories;

use App\Models\CotacaoCruzeiro;
use InfyOm\Generator\Common\BaseRepository;

class CotacaoCruzeiroRepository extends BaseRepository
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
        return CotacaoCruzeiro::class;
    }
}
