<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Agente;

/**
 * Class AgenteTransformer - Transformador de Expedicoes para a tela interna
 * @package namespace App\Transformers;
 */
class AgenteTransformer extends TransformerAbstract
{

    /**
     * Transform the \Agente entity
     * @param \Agente $model
     *
     * @return array
     */
    public function transform(Agente $model)
    {
        return [
            "nome" => $model->nome,
            "local" => $model->local,
            "foto" => $model->foto->cloudinary_id
        ];
    }
}
