<?php

namespace App\Traits;

trait ExpedicaoExperienciaRepositoryTrait
{
    /**
     * Metodo para retornar as edicoes futuras das expedicoes.
     *
     * @return App\Models\Expedicao
     */
    public function getEdicoesFuturas()
    {
        return $this->model->futuras()->get();
    }

    /**
     * Metodo para retornar as edicoes passadas das expedicoes.
     *
     * @return App\Models\Expedicao
     */
    public function getEdicoesPassadas()
    {
        return $this->model->passadas()->get();
    }
}
