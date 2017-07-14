<?php

namespace App\Repositories;

use App\Models\BlocoDescricao;
use InfyOm\Generator\Common\BaseRepository;

class BlocoDescricaoRepository extends BaseRepository
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
        return BlocoDescricao::class;
    }
}
