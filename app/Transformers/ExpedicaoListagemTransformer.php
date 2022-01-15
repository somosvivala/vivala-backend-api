<?php

namespace App\Transformers;

use App\Models\Expedicao;
use League\Fractal\TransformerAbstract;

/**
 * Class ExpedicaoTransformer - Transformador de Expedicoes para a tela de Listagem.
 */
class ExpedicaoListagemTransformer extends TransformerAbstract
{
    /**
     * Transform the \Expedicao entity.
     *
     * @param  \Expedicao  $model
     * @return array
     */
    public function transform(Expedicao $model)
    {
        return [
            'id' => $model->id,
            'titulo' => $model->titulo,
            'foto' => $model->mediaListagem ? $model->mediaListagem->cloudinary_id : null,
            'foto_link' => $model->mediaListagem ? $model->fotoLink : null,
            'link_destino' => $model->link_destino,
        ];
    }
}
