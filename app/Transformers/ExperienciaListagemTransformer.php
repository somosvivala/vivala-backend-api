<?php

namespace App\Transformers;

use App\Models\Experiencia;
use League\Fractal\TransformerAbstract;

/**
 * Class ExperienciaTransformer - Transformador de Experiencias para a tela de Listagem.
 */
class ExperienciaListagemTransformer extends TransformerAbstract
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
            'id' => $model->id,
            'titulo' => $model->titulo,
            'foto' => $model->mediaListagem ? $model->mediaListagem->cloudinary_id : null,
            'descricao' => $model->descricao_listagem,
        ];
    }
}
