<?php

namespace App\Transformers;

use App\Models\Experiencia;
use League\Fractal\TransformerAbstract;

/**
 * Class ExperienciaTransformer - Transformador de Experiencias para a tela interna.
 */
class ExperienciaTransformer extends TransformerAbstract
{
    /**
     * Transform the \Experiencia entity.
     * @param \Experiencia $model
     *
     * @return array
     */
    public function transform(Experiencia $model)
    {
        return [
            'titulo' => $model->titulo,
            'inscricoes_abertas' => $model->inscricoesAbertas,
            'itens_slider' => $model->mediasSlider,
            'descricoes' => $model->blocosDescricao->all(),
        ];
    }
}
