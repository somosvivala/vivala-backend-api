<?php

namespace App\Repositories;

use App\Models\InscricaoNewsletter;
use InfyOm\Generator\Common\BaseRepository;

class InscricaoNewsletterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'email',
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return InscricaoNewsletter::class;
    }
}
