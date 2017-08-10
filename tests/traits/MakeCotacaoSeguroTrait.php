<?php

use Faker\Factory as Faker;
use App\Models\CotacaoSeguro;
use App\Repositories\CotacaoSeguroRepository;

trait MakeCotacaoSeguroTrait
{
    /**
     * Create fake instance of CotacaoSeguro and save it in database
     *
     * @param array $cotacaoSeguroFields
     * @return CotacaoSeguro
     */
    public function makeCotacaoSeguro($cotacaoSeguroFields = [])
    {
        /** @var CotacaoSeguroRepository $cotacaoSeguroRepo */
        $cotacaoSeguroRepo = App::make(CotacaoSeguroRepository::class);
        $theme = $this->fakeCotacaoSeguroData($cotacaoSeguroFields);
        return $cotacaoSeguroRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoSeguro
     *
     * @param array $cotacaoSeguroFields
     * @return CotacaoSeguro
     */
    public function fakeCotacaoSeguro($cotacaoSeguroFields = [])
    {
        return new CotacaoSeguro($this->fakeCotacaoSeguroData($cotacaoSeguroFields));
    }

    /**
     * Get fake data of CotacaoSeguro
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCotacaoSeguroData($cotacaoSeguroFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'origem' => $fake->word,
            'destino' => $fake->word,
            'data_ida' => $fake->word,
            'data_volta' => $fake->word,
            'esportes_radicais' => $fake->word,
            'solicitacoes' => $fake->word,
            'datas_nascimento_seguro_viagem' => $fake->word,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cotacaoSeguroFields);
    }
}
