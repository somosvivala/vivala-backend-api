<?php

use Faker\Factory as Faker;
use App\Models\CotacaoRodoviario;
use App\Repositories\CotacaoRodoviarioRepository;

trait MakeCotacaoRodoviarioTrait
{
    /**
     * Create fake instance of CotacaoRodoviario and save it in database
     *
     * @param array $cotacaoRodoviarioFields
     * @return CotacaoRodoviario
     */
    public function makeCotacaoRodoviario($cotacaoRodoviarioFields = [])
    {
        /** @var CotacaoRodoviarioRepository $cotacaoRodoviarioRepo */
        $cotacaoRodoviarioRepo = App::make(CotacaoRodoviarioRepository::class);
        $theme = $this->fakeCotacaoRodoviarioData($cotacaoRodoviarioFields);
        return $cotacaoRodoviarioRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoRodoviario
     *
     * @param array $cotacaoRodoviarioFields
     * @return CotacaoRodoviario
     */
    public function fakeCotacaoRodoviario($cotacaoRodoviarioFields = [])
    {
        return new CotacaoRodoviario($this->fakeCotacaoRodoviarioData($cotacaoRodoviarioFields));
    }

    /**
     * Get fake data of CotacaoRodoviario
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCotacaoRodoviarioData($cotacaoRodoviarioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'origem' => $fake->word,
            'destino' => $fake->word,
            'data_ida' => $fake->word,
            'data_volta' => $fake->word,
            'sem_volta' => $fake->word,
            'datas_flexiveis' => $fake->word,
            'qnt_passageiros' => $fake->randomDigitNotNull,
            'hora_ida' => $fake->word,
            'hora_volta' => $fake->word,
            'companias_preferenciais' => $fake->word,
            'duracao_maxima' => $fake->word,
            'solicitacoes' => $fake->word,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cotacaoRodoviarioFields);
    }
}
