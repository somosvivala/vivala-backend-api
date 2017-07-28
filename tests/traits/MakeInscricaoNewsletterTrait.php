<?php

use Faker\Factory as Faker;
use App\Models\InscricaoNewsletter;
use App\Repositories\InscricaoNewsletterRepository;

trait MakeInscricaoNewsletterTrait
{
    /**
     * Create fake instance of InscricaoNewsletter and save it in database.
     *
     * @param array $inscricaoNewsletterFields
     * @return InscricaoNewsletter
     */
    public function makeInscricaoNewsletter($inscricaoNewsletterFields = [])
    {
        /** @var InscricaoNewsletterRepository $inscricaoNewsletterRepo */
        $inscricaoNewsletterRepo = App::make(InscricaoNewsletterRepository::class);
        $theme = $this->fakeInscricaoNewsletterData($inscricaoNewsletterFields);

        return $inscricaoNewsletterRepo->create($theme);
    }

    /**
     * Get fake instance of InscricaoNewsletter.
     *
     * @param array $inscricaoNewsletterFields
     * @return InscricaoNewsletter
     */
    public function fakeInscricaoNewsletter($inscricaoNewsletterFields = [])
    {
        return new InscricaoNewsletter($this->fakeInscricaoNewsletterData($inscricaoNewsletterFields));
    }

    /**
     * Get fake data of InscricaoNewsletter.
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInscricaoNewsletterData($inscricaoNewsletterFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nome' => $fake->text,
            'email' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
        ], $inscricaoNewsletterFields);
    }
}
