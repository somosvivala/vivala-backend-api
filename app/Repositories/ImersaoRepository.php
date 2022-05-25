<?php

namespace App\Repositories;

use App\Models\Imersao;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ImersaoRepository.
 *
 * @version April 20, 2018, 11:48 pm BRT
 *
 * @method Imersao findWithoutFail($id, $columns = ['*'])
 * @method Imersao find($id, $columns = ['*'])
 * @method Imersao first($columns = ['*'])
 */
class ImersaoRepository extends BaseRepository
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
        return Imersao::class;
    }

    /**
     * Retorna as Expedicoes ativas.
     *
     * @return void
     */
    public function getAtivas()
    {
        return Imersao::ativas()->orderBy('ordem')->get();
    }

    /**
     * Ativa a imersao para que passe a ser retornada via API.
     *
     * @return void
     */
    public function ativaImersao(Imersao $imersao)
    {
        return $imersao->update([
            'ativo_listagem' => true,
        ]);
    }

    /**
     * Desativa a imersao para que passe a ser retornada via API.
     *
     * @return void
     */
    public function desativaImersao(Imersao $imersao)
    {
        return $imersao->update([
            'ativo_listagem' => false,
        ]);
    }
}
