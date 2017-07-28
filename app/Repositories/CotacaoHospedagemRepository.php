<?php

namespace App\Repositories;

use App\Models\CotacaoHospedagem;
use InfyOm\Generator\Common\BaseRepository;

class CotacaoHospedagemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'data_ida',
        'data_volta',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return CotacaoHospedagem::class;
    }
}
