<?php

use App\Models\ContatoAgente;
use App\Repositories\ContatoAgenteRepository;
use Faker\Factory as Faker;

trait MakeContatoAgenteTrait
{
    /**
     * Create fake instance of ContatoAgente and save it in database.
     *
     * @param  array  $contatoAgenteFields
     * @return ContatoAgente
     */
    public function makeContatoAgente($contatoAgenteFields = [])
    {
        /** @var ContatoAgenteRepository $contatoAgenteRepo */
        $contatoAgenteRepo = App::make(ContatoAgenteRepository::class);
        $theme = $this->fakeContatoAgenteData($contatoAgenteFields);

        return $contatoAgenteRepo->create($theme);
    }

    /**
     * Get fake instance of ContatoAgente.
     *
     * @param  array  $contatoAgenteFields
     * @return ContatoAgente
     */
    public function fakeContatoAgente($contatoAgenteFields = [])
    {
        return new ContatoAgente($this->fakeContatoAgenteData($contatoAgenteFields));
    }

    /**
     * Get fake data of ContatoAgente.
     *
     * @param  array  $postFields
     * @return array
     */
    public function fakeContatoAgenteData($contatoAgenteFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome_completo' => $fake->word,
            'nome_preferencia' => $fake->word,
            'email' => $fake->word,
            'telefone' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $contatoAgenteFields);
    }
}
