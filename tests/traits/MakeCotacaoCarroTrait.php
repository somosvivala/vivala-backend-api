<?php

use Faker\Factory as Faker;
use App\Models\CotacaoCarro;
use App\Repositories\CotacaoCarroRepository;

trait MakeCotacaoCarroTrait
{
    /**
     * Create fake instance of CotacaoCarro and save it in database.
     *
     * @param array $cotacaoCarroFields
     * @return CotacaoCarro
     */
    public function makeCotacaoCarro($cotacaoCarroFields = [])
    {
        /** @var CotacaoCarroRepository $cotacaoCarroRepo */
        $cotacaoCarroRepo = App::make(CotacaoCarroRepository::class);
        $theme = $this->fakeCotacaoCarroData($cotacaoCarroFields);

        return $cotacaoCarroRepo->create($theme);
    }

    /**
     * Get fake instance of CotacaoCarro.
     *
     * @param array $cotacaoCarroFields
     * @return CotacaoCarro
     */
    public function fakeCotacaoCarro($cotacaoCarroFields = [])
    {
        return new CotacaoCarro($this->fakeCotacaoCarroData($cotacaoCarroFields));
    }

    /**
     * Get fake data of CotacaoCarro.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCotacaoCarroData($cotacaoCarroFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'cidade_retirada' => $fake->word,
            'cidade_devolucao' => $fake->word,
            'data_retirada' => $fake->word,
            'data_devolucao' => $fake->word,
            'hora_retirada' => $fake->word,
            'hora_devolucao' => $fake->word,
            'categorias_carro' => $fake->word,
            'itens_carro' => $fake->word,
            'solicitacoes_carro' => $fake->word,
            'preco_desejado_carro' => $fake->randomDigitNotNull,
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $cotacaoCarroFields);
    }
}
