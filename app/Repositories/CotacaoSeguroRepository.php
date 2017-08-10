<?php

namespace App\Repositories;

use App\Models\CotacaoSeguro;
use InfyOm\Generator\Common\BaseRepository;

class CotacaoSeguroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origem',
        'destino',
        'data_ida',
        'data_volta',
        'esportes_radicais'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CotacaoSeguro::class;
    }
}
