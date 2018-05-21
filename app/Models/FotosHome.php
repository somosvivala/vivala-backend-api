<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FotosHome extends Model
{
    public $fillable = [
        'foto_volunturismo_id',
        'foto_ecoturismo_id',
        'foto_imersoes_id',
        'foto_instituto_id',
    ];

    /**
     * Relacao com o Model Foto, representando a foto de destaque de Volunturismo
     */
    public function fotoVolunturismo()
    {
        return $this->hasOne(\App\Models\Foto::class, 'id', 'foto_volunturismo_id');
    }

    /**
     * Relacao com o Model Foto, representando a foto de destaque de Ecoturismo
     */
    public function fotoEcoturismo()
    {
        return $this->hasOne(\App\Models\Foto::class, 'id', 'foto_ecoturismo_id');
    }

    /**
     * Relacao com o Model Foto, representando a foto de destaque de Imersoes
     */
    public function fotoImersoes()
    {
        return $this->hasOne(\App\Models\Foto::class, 'id', 'foto_imersoes_id');
    }

    /**
     * Relacao com o Model Foto, representando a foto de destaque do Instituto
     */
    public function fotoInstituto()
    {
        return $this->hasOne(\App\Models\Foto::class, 'id', 'foto_instituto_id');
    }
    

}

