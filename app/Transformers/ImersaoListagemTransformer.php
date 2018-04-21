<?php

namespace App\Transformers;

use App\Models\Imersao;
use League\Fractal\TransformerAbstract;

/**
 * Class ImersaoTransformer - Transformador de Imersaos para a tela de Listagem.
 */
class ImersaoListagemTransformer extends TransformerAbstract
{
    /**
     * Transform the \Imersao entity.
     * @param \Imersao $model
     *
     * @return array
     */
    public function transform(Imersao $model)
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
