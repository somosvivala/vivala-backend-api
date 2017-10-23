<?php

namespace App\Transformers;

use App\Models\Agente;
use League\Fractal\TransformerAbstract;

/**
 * Class AgenteTransformer - Transformador de Expedicoes para a tela interna.
 */
class AgenteTransformer extends TransformerAbstract
{
    /**
     * Transform the \Agente entity.
     * @param \Agente $model
     *
     * @return array
     */
    public function transform(Agente $model)
    {
        return [
            'nome' => $model->nome,
            'local' => $model->local,
            'foto' => $model->foto ? $model->foto->cloudinary_id : null,
        ];
    }
}
