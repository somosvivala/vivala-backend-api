<?php

use App\Models\CotacaoHospedagem;
use App\Repositories\CotacaoHospedagemRepository;
use Faker\Factory as Faker;

trait MakeCotacaoHospedagemTrait
{
    /**
     * Create fake instance of CotacaoHospedagem and save it in database.
     *
     * @param  array  $cotacaoHospedagemFields
     * @return CotacaoHospedagem
     */
    public function makeCotacaoHospedagem($cotacaoHospedagemFields = [])
    {
        /** @var CotacaoHospedagemRepository $cotacaoHospedagemRepo */
        $cotacaoHospedagemRepo = App::make(CotacaoHospedagemRepository::class);
        $theme = $this->fakeCotacaoHospedagemData($cotacaoHospedagemFields);

        return $cotacaoHospedagemRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoHospedagem.
     *
     * @param  array  $cotacaoHospedagemFields
     * @return CotacaoHospedagem
     */
    public function fakeCotacaoHospedagem($cotacaoHospedagemFields = [])
    {
        return new CotacaoHospedagem($this->fakeCotacaoHospedagemData($cotacaoHospedagemFields));
    }

    /**
     * Get fake data of CotacaoHospedagem.
     *
     * @param  array  $postFields
     * @return array
     */
    public function fakeCotacaoHospedagemData($cotacaoHospedagemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'hotel_ou_regiao' => $fake->word,
            'data_ida' => $fake->word,
            'data_volta' => $fake->word,
            'qnt_adultos' => $fake->randomDigitNotNull,
            'qnt_criancas' => $fake->randomDigitNotNull,
            'qnt_bebes' => $fake->randomDigitNotNull,
            'tipo_quarto' => $fake->word,
            'qnt_quartos' => $fake->randomDigitNotNull,
            'hospedagem_servicos' => $fake->word,
            'hospedagem_tipo' => $fake->word,
            'hospedagem_solicitacoes' => $fake->word,
            'hospedagem_preco_desejado' => $fake->randomDigitNotNull,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $cotacaoHospedagemFields);
    }
}
