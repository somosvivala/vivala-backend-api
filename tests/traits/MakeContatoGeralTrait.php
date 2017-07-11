<?php

use Faker\Factory as Faker;
use App\Models\ContatoGeral;
use App\Repositories\ContatoGeralRepository;

trait MakeContatoGeralTrait
{
    /**
     * Create fake instance of ContatoGeral and save it in database
     *
     * @param array $contatoGeralFields
     * @return ContatoGeral
     */
    public function makeContatoGeral($contatoGeralFields = [])
    {
        /** @var ContatoGeralRepository $contatoGeralRepo */
        $contatoGeralRepo = App::make(ContatoGeralRepository::class);
        $theme = $this->fakeContatoGeralData($contatoGeralFields);
        return $contatoGeralRepo->create($theme);
    }

    /**
     * Get fake instance of ContatoGeral
     *
     * @param array $contatoGeralFields
     * @return ContatoGeral
     */
    public function fakeContatoGeral($contatoGeralFields = [])
    {
        return new ContatoGeral($this->fakeContatoGeralData($contatoGeralFields));
    }

    /**
     * Get fake data of ContatoGeral
     *
     * @param array $postFields
     * @return array
     */
    public function fakeContatoGeralData($contatoGeralFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $contatoGeralFields);
    }
}
