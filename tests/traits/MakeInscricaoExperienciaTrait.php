<?php

use Faker\Factory as Faker;
use App\Models\InscricaoExperiencia;
use App\Repositories\InscricaoExperienciaRepository;

trait MakeInscricaoExperienciaTrait
{
    /**
     * Create fake instance of InscricaoExperiencia and save it in database.
     *
     * @param array $inscricaoExperienciaFields
     * @return InscricaoExperiencia
     */
    public function makeInscricaoExperiencia($inscricaoExperienciaFields = [])
    {
        /** @var InscricaoExperienciaRepository $inscricaoExperienciaRepo */
        $inscricaoExperienciaRepo = App::make(InscricaoExperienciaRepository::class);
        $theme = $this->fakeInscricaoExperienciaData($inscricaoExperienciaFields);

        return $inscricaoExperienciaRepo->create($theme);
    }

    /**
     * Get fake instance of InscricaoExperiencia.
     *
     * @param array $inscricaoExperienciaFields
     * @return InscricaoExperiencia
     */
    public function fakeInscricaoExperiencia($inscricaoExperienciaFields = [])
    {
        return new InscricaoExperiencia($this->fakeInscricaoExperienciaData($inscricaoExperienciaFields));
    }

    /**
     * Get fake data of InscricaoExperiencia.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInscricaoExperienciaData($inscricaoExperienciaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'cod_status' => $fake->randomDigitNotNull,
            'nome_status' => $fake->word,
            'expedicao_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $inscricaoExperienciaFields);
    }
}
