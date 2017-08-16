<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Expedicao;

/**
 * Class ExpedicaoTransformer - Transformador de Expedicoes para a tela de Listagem
 * @package namespace App\Transformers;
 */
class ExpedicaoListagemTransformer extends TransformerAbstract
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
            "id" => $model->id,
            "titulo" => $model->titulo,
            "foto" => $model->mediaListagem ? $model->mediaListagem->cloudinary_id : null,
            "descricao" => $model->descricao_listagem,
        ];
    }
}
