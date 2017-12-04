<?php

namespace App\Transformers;

use App\Models\Expedicao;
use League\Fractal\TransformerAbstract;

/**
 * Class ExpedicaoTransformer - Transformador de Expedicoes para a tela interna.
 */
class ExpedicaoTransformer extends TransformerAbstract
{
    /**
     * Transform the \Expedicao entity.
     * @param \Expedicao $model
     *
     * @return array
     */
    public function transform(Expedicao $model)
    {
        return [
            'titulo' => $model->titulo,
            'inscricoes_abertas' => $model->inscricoesAbertas,
            'url_pagseguro' => $model->urlPagamento,
            'itens_slider' => $model->mediasSlider,
            'descricoes' => $model->blocosDescricao->all(),
        ];
    }
}
