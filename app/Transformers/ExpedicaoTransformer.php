<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Expedicao;

/**
 * Class ExpedicaoTransformer - Transformador de Expedicoes para a tela interna
 * @package namespace App\Transformers;
 */
class ExpedicaoTransformer extends TransformerAbstract
{

    /**
     * Transform the \Expedicao entity
     * @param \Expedicao $model
     *
     * @return array
     */
    public function transform(Expedicao $model)
    {
        return [
            "titulo" => $model->titulo,
            "inscricoes_abertas" => $model->inscricoesAbertas,
            "itens_slider" => $model->mediasSlider,
            "descricoes" => $model->blocosDescricao->all(),
        ];
    }
}
