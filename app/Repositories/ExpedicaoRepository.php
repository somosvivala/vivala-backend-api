<?php

namespace App\Repositories;

use App\Models\Expedicao;
use App\Traits\ExpedicaoExperienciaRepositoryTrait;
use InfyOm\Generator\Common\BaseRepository;

class ExpedicaoRepository extends BaseRepository
{
    use ExpedicaoExperienciaRepositoryTrait;

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

    /**
     * Retorna as Expedicoes ativas.
     *
     * @return void
     */
    public function getAtivas()
    {
        return Expedicao::ativas()->orderBy('ordem')->get();
    }

    /**
     * Ativa a expedicao para que passe a ser retornada via API.
     *
     * @return void
     */
    public function ativaExpedicao(Expedicao $expedicao)
    {
        return $expedicao->update([
            'ativo_listagem' => true,
        ]);
    }

    /**
     * Desativa a expedicao para que passe a ser retornada via API.
     *
     * @return void
     */
    public function desativaExpedicao(Expedicao $expedicao)
    {
        return $expedicao->update([
            'ativo_listagem' => false,
        ]);
    }
}
