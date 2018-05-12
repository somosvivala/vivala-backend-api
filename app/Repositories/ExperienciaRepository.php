<?php

namespace App\Repositories;

use App\Models\Experiencia;
use InfyOm\Generator\Common\BaseRepository;
use App\Traits\ExpedicaoExperienciaRepositoryTrait;

class ExperienciaRepository extends BaseRepository
{
    //Utilizando de um Trait para herdar comportamento em comum de + de 1 Repositorio
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
        return Experiencia::class;
    }

    /**
     * Retorna as Experiencias ativas.
     *
     * @return void
     */
    public function getAtivas()
    {
        return Experiencia::ativas()->orderBy('ordem')->get();
    }

    /**
     * Ativa a experiencia para que passe a ser retornada via API.
     *
     * @return void
     */
    public function ativaExperiencia(Experiencia $experiencia)
    {
        return $experiencia->update([
            'ativo_listagem' => true,
        ]);
    }

    /**
     * Desativa a experiencia para que passe a ser retornada via API.
     *
     * @return void
     */
    public function desativaExperiencia(Experiencia $experiencia)
    {
        return $experiencia->update([
            'ativo_listagem' => false,
        ]);
    }
}
