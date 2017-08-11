<?php

use Faker\Factory as Faker;
use App\Models\CotacaoCruzeiro;
use App\Repositories\CotacaoCruzeiroRepository;

trait MakeCotacaoCruzeiroTrait
{
    /**
     * Create fake instance of CotacaoCruzeiro and save it in database.
     *
     * @param array $cotacaoCruzeiroFields
     * @return CotacaoCruzeiro
     */
    public function makeCotacaoCruzeiro($cotacaoCruzeiroFields = [])
    {
        /** @var CotacaoCruzeiroRepository $cotacaoCruzeiroRepo */
        $cotacaoCruzeiroRepo = App::make(CotacaoCruzeiroRepository::class);
        $theme = $this->fakeCotacaoCruzeiroData($cotacaoCruzeiroFields);

        return $cotacaoCruzeiroRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoCruzeiro.
     *
     * @param array $cotacaoCruzeiroFields
     * @return CotacaoCruzeiro
     */
    public function fakeCotacaoCruzeiro($cotacaoCruzeiroFields = [])
    {
        return new CotacaoCruzeiro($this->fakeCotacaoCruzeiroData($cotacaoCruzeiroFields));
    }

    /**
     * Get fake data of CotacaoCruzeiro.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCotacaoCruzeiroData($cotacaoCruzeiroFields = [])
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
            'preco_desejado' => $fake->randomDigitNotNull,
            'companias_preferenciais' => $fake->word,
            'max_dias' => $fake->randomDigitNotNull,
            'solicitacoes' => $fake->word,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $cotacaoCruzeiroFields);
    }
}
