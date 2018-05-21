<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideosServico extends Model
{
    public $fillable = [
        'video_volunturismo_id',
        'video_ecoturismo_id',
        'video_imersoes_id',
    ];

    /**
     * Relacao com o Model video, representando a video de destaque de Volunturismo.
     */
    public function videoVolunturismo()
    {
        return $this->hasOne(\App\Models\Video::class, 'id', 'video_volunturismo_id');
    }

    /**
     * Relacao com o Model video, representando a video de destaque de Ecoturismo.
     */
    public function videoEcoturismo()
    {
        return $this->hasOne(\App\Models\Video::class, 'id', 'video_ecoturismo_id');
    }

    /**
     * Relacao com o Model video, representando a video de destaque de Imersoes.
     */
    public function videoImersoes()
    {
        return $this->hasOne(\App\Models\Video::class, 'id', 'video_imersoes_id');
    }
}
