<?php

use App\Models\CotacaoAereo;
use App\Repositories\CotacaoAereoRepository;
use Faker\Factory as Faker;

trait MakeCotacaoAereoTrait
{
    /**
     * Create fake instance of CotacaoAereo and save it in database.
     *
     * @param array $cotacaoAereoFields
     * @return CotacaoAereo
     */
    public function makeCotacaoAereo($cotacaoAereoFields = [])
    {
        /** @var CotacaoAereoRepository $cotacaoAereoRepo */
        $cotacaoAereoRepo = App::make(CotacaoAereoRepository::class);
        $theme = $this->fakeCotacaoAereoData($cotacaoAereoFields);

        return $cotacaoAereoRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoAereo.
     *
     * @param array $cotacaoAereoFields
     * @return CotacaoAereo
     */
    public function fakeCotacaoAereo($cotacaoAereoFields = [])
    {
        return new CotacaoAereo($this->fakeCotacaoAereoData($cotacaoAereoFields));
    }

    /**
     * Get fake data of CotacaoAereo.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCotacaoAereoData($cotacaoAereoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'origem' => $fake->word,
            'destino' => $fake->word,
            'data_ida' => $fake->word,
            'data_volta' => $fake->word,
            'datas_flexiveis' => $fake->word,
            'qnt_adultos' => $fake->randomDigitNotNull,
            'qnt_criancas' => $fake->randomDigitNotNull,
            'qnt_bebes' => $fake->randomDigitNotNull,
            'periodo_voo_ida' => $fake->word,
            'periodo_voo_volta' => $fake->word,
            'aeroporto_origem' => $fake->word,
            'aeroporto_retorno' => $fake->word,
            'companias_aereas_preferenciais' => $fake->word,
            'numero_paradas' => $fake->randomDigitNotNull,
            'tempo_voo' => $fake->word,
            'aereo_preco_desejado' => $fake->randomDigitNotNull,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $cotacaoAereoFields);
    }
}
