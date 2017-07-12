<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscricaoNewsletterApiTest extends TestCase
{
    use MakeInscricaoNewsletterTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->fakeInscricaoNewsletterData();
        $this->json('POST', '/api/v1/inscricaoNewsletters', $inscricaoNewsletter);

        $this->assertApiResponse($inscricaoNewsletter);
    }

    /**
     * @test
     */
    public function testReadInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->makeInscricaoNewsletter();
        $this->json('GET', '/api/v1/inscricaoNewsletters/'.$inscricaoNewsletter->id);

        $this->assertApiResponse($inscricaoNewsletter->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->makeInscricaoNewsletter();
        $editedInscricaoNewsletter = $this->fakeInscricaoNewsletterData();

        $this->json('PUT', '/api/v1/inscricaoNewsletters/'.$inscricaoNewsletter->id, $editedInscricaoNewsletter);

        $this->assertApiResponse($editedInscricaoNewsletter);
    }

    /**
     * @test
     */
    public function testDeleteInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->makeInscricaoNewsletter();
        $this->json('DELETE', '/api/v1/inscricaoNewsletters/'.$inscricaoNewsletter->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inscricaoNewsletters/'.$inscricaoNewsletter->id);

        $this->assertResponseStatus(404);
    }
}
