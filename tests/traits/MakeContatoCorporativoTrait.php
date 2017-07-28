<?php

use Faker\Factory as Faker;
use App\Models\ContatoCorporativo;
use App\Repositories\ContatoCorporativoRepository;

trait MakeContatoCorporativoTrait
{
    /**
     * Create fake instance of ContatoCorporativo and save it in database.
     *
     * @param array $contatoCorporativoFields
     * @return ContatoCorporativo
     */
    public function makeContatoCorporativo($contatoCorporativoFields = [])
    {
        /** @var ContatoCorporativoRepository $contatoCorporativoRepo */
        $contatoCorporativoRepo = App::make(ContatoCorporativoRepository::class);
        $theme = $this->fakeContatoCorporativoData($contatoCorporativoFields);

        return $contatoCorporativoRepo->create($theme);
    }

    /**
     * Get fake instance of ContatoCorporativo.
     *
     * @param array $contatoCorporativoFields
     * @return ContatoCorporativo
     */
    public function fakeContatoCorporativo($contatoCorporativoFields = [])
    {
        return new ContatoCorporativo($this->fakeContatoCorporativoData($contatoCorporativoFields));
    }

    /**
     * Get fake data of ContatoCorporativo.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeContatoCorporativoData($contatoCorporativoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome_contato' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'nome_empresa' => $fake->word,
            'numero_funcionarios' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $contatoCorporativoFields);
    }
}
