<?php

use Faker\Factory as Faker;
use App\Models\CotacaoPasseio;
use App\Repositories\CotacaoPasseioRepository;

trait MakeCotacaoPasseioTrait
{
    /**
     * Create fake instance of CotacaoPasseio and save it in database.
     *
     * @param array $cotacaoPasseioFields
     * @return CotacaoPasseio
     */
    public function makeCotacaoPasseio($cotacaoPasseioFields = [])
    {
        /** @var CotacaoPasseioRepository $cotacaoPasseioRepo */
        $cotacaoPasseioRepo = App::make(CotacaoPasseioRepository::class);
        $theme = $this->fakeCotacaoPasseioData($cotacaoPasseioFields);

        return $cotacaoPasseioRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoPasseio.
     *
     * @param array $cotacaoPasseioFields
     * @return CotacaoPasseio
     */
    public function fakeCotacaoPasseio($cotacaoPasseioFields = [])
    {
        return new CotacaoPasseio($this->fakeCotacaoPasseioData($cotacaoPasseioFields));
    }

    /**
     * Get fake data of CotacaoPasseio.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCotacaoPasseioData($cotacaoPasseioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'destino' => $fake->word,
            'data_ida' => $fake->word,
            'data_volta' => $fake->word,
            'qnt_adultos' => $fake->randomDigitNotNull,
            'qnt_criancas' => $fake->randomDigitNotNull,
            'qnt_bebes' => $fake->randomDigitNotNull,
            'passeios_interesses' => $fake->word,
            'solicitacoes' => $fake->word,
            'preco_desejado' => $fake->randomDigitNotNull,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $cotacaoPasseioFields);
    }
}
