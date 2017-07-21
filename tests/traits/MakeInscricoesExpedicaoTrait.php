<?php

use Faker\Factory as Faker;
use App\Models\InscricoesExpedicao;
use App\Repositories\InscricoesExpedicaoRepository;

trait MakeInscricoesExpedicaoTrait
{
    /**
     * Create fake instance of InscricoesExpedicao and save it in database
     *
     * @param array $inscricoesExpedicaoFields
     * @return InscricoesExpedicao
     */
    public function makeInscricoesExpedicao($inscricoesExpedicaoFields = [])
    {
        /** @var InscricoesExpedicaoRepository $inscricoesExpedicaoRepo */
        $inscricoesExpedicaoRepo = App::make(InscricoesExpedicaoRepository::class);
        $theme = $this->fakeInscricoesExpedicaoData($inscricoesExpedicaoFields);
        return $inscricoesExpedicaoRepo->create($theme);
    }

    /**
     * Get fake instance of InscricoesExpedicao
     *
     * @param array $inscricoesExpedicaoFields
     * @return InscricoesExpedicao
     */
    public function fakeInscricoesExpedicao($inscricoesExpedicaoFields = [])
    {
        return new InscricoesExpedicao($this->fakeInscricoesExpedicaoData($inscricoesExpedicaoFields));
    }

    /**
     * Get fake data of InscricoesExpedicao
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInscricoesExpedicaoData($inscricoesExpedicaoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'cod_status' => $fake->randomDigitNotNull,
            'nome_status' => $fake->word,
            'owner_id' => $fake->randomDigitNotNull,
            'owner_type' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $inscricoesExpedicaoFields);
    }
}
