<?php

namespace App\Repositories;

use App\Models\CotacaoRodoviario;
use InfyOm\Generator\Common\BaseRepository;

class CotacaoRodoviarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'origem',
        'destino',
        'data_ida',
        'data_volta',
        'sem_volta',
        'datas_flexiveis',
        'hora_ida',
        'hora_volta',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return CotacaoRodoviario::class;
    }
}
