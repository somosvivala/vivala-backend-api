<?php

use App\Models\CotacaoPacote;
use App\Repositories\CotacaoPacoteRepository;
use Faker\Factory as Faker;

trait MakeCotacaoPacoteTrait
{
    /**
     * Create fake instance of CotacaoPacote and save it in database.
     *
     * @param  array  $cotacaoPacoteFields
     * @return CotacaoPacote
     */
    public function makeCotacaoPacote($cotacaoPacoteFields = [])
    {
        /** @var CotacaoPacoteRepository $cotacaoPacoteRepo */
        $cotacaoPacoteRepo = App::make(CotacaoPacoteRepository::class);
        $theme = $this->fakeCotacaoPacoteData($cotacaoPacoteFields);

        return $cotacaoPacoteRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoPacote.
     *
     * @param  array  $cotacaoPacoteFields
     * @return CotacaoPacote
     */
    public function fakeCotacaoPacote($cotacaoPacoteFields = [])
    {
        return new CotacaoPacote($this->fakeCotacaoPacoteData($cotacaoPacoteFields));
    }

    /**
     * Get fake data of CotacaoPacote.
     *
     * @param  array  $postFields
     * @return array
     */
    public function fakeCotacaoPacoteData($cotacaoPacoteFields = [])
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
            'hotel_ou_regiao' => $fake->word,
            'qnt_quartos' => $fake->randomDigitNotNull,
            'tipo_quarto' => $fake->word,
            'hospedagem_servicos' => $fake->word,
            'hospedagem_tipo' => $fake->word,
            'hospedagem_solicitacoes' => $fake->word,
            'hospedagem_preco_desejado' => $fake->randomDigitNotNull,
            'transporte_interno' => $fake->randomDigitNotNull,
            'tipos_transfer' => $fake->randomDigitNotNull,
            'categorias_carro' => $fake->word,
            'itens_carro' => $fake->word,
            'transporte_interno_solicitacoes' => $fake->word,
            'transporte_interno_preco_desejado' => $fake->randomDigitNotNull,
            'passeios_interesses' => $fake->word,
            'passeios_outros' => $fake->word,
            'passeios_preco_desejado' => $fake->randomDigitNotNull,
            'nomes_seguro_viagem' => $fake->word,
            'datas_nascimento_seguro_viagem' => $fake->word,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $cotacaoPacoteFields);
    }
}
