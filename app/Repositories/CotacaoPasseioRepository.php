<?php

namespace App\Repositories;

use App\Models\CotacaoPasseio;
use InfyOm\Generator\Common\BaseRepository;

class CotacaoPasseioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'destino',
        'data_ida',
        'data_volta',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return CotacaoPasseio::class;
    }
}
