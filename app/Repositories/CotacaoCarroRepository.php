<?php

namespace App\Repositories;

use App\Models\CotacaoCarro;
use InfyOm\Generator\Common\BaseRepository;

class CotacaoCarroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cidade_retirada',
        'cidade_devolucao',
        'data_retirada',
        'data_devolucao'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CotacaoCarro::class;
    }
}
