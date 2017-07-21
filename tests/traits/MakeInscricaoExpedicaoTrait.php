<?php

use Faker\Factory as Faker;
use App\Models\InscricaoExpedicao;
use App\Repositories\InscricaoExpedicaoRepository;

trait MakeInscricaoExpedicaoTrait
{
    /**
     * Create fake instance of InscricaoExpedicao and save it in database
     *
     * @param array $inscricaoExpedicaoFields
     * @return InscricaoExpedicao
     */
    public function makeInscricaoExpedicao($inscricaoExpedicaoFields = [])
    {
        /** @var InscricaoExpedicaoRepository $inscricaoExpedicaoRepo */
        $inscricaoExpedicaoRepo = App::make(InscricaoExpedicaoRepository::class);
        $theme = $this->fakeInscricaoExpedicaoData($inscricaoExpedicaoFields);
        return $inscricaoExpedicaoRepo->create($theme);
    }

    /**
     * Get fake instance of InscricaoExpedicao
     *
     * @param array $inscricaoExpedicaoFields
     * @return InscricaoExpedicao
     */
    public function fakeInscricaoExpedicao($inscricaoExpedicaoFields = [])
    {
        return new InscricaoExpedicao($this->fakeInscricaoExpedicaoData($inscricaoExpedicaoFields));
    }

    /**
     * Get fake data of InscricaoExpedicao
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInscricaoExpedicaoData($inscricaoExpedicaoFields = [])
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
            'updated_at' => $fake->word
        ], $inscricaoExpedicaoFields);
    }
}
