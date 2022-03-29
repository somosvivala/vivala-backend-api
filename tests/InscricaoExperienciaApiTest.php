<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class InscricaoExperienciaApiTest extends TestCase
{
    use MakeInscricaoExperienciaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->fakeInscricaoExperienciaData();
        $this->json('POST', '/api/v1/inscricaoExperiencias', $inscricaoExperiencia);

        $this->assertApiResponse($inscricaoExperiencia);
    }

    /**
     * @test
     */
    public function testReadInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->makeInscricaoExperiencia();
        $this->json('GET', '/api/v1/inscricaoExperiencias/'.$inscricaoExperiencia->id);

        $this->assertApiResponse($inscricaoExperiencia->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->makeInscricaoExperiencia();
        $editedInscricaoExperiencia = $this->fakeInscricaoExperienciaData();

        $this->json('PUT', '/api/v1/inscricaoExperiencias/'.$inscricaoExperiencia->id, $editedInscricaoExperiencia);

        $this->assertApiResponse($editedInscricaoExperiencia);
    }

    /**
     * @test
     */
    public function testDeleteInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->makeInscricaoExperiencia();
        $this->json('DELETE', '/api/v1/inscricaoExperiencias/'.$inscricaoExperiencia->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inscricaoExperiencias/'.$inscricaoExperiencia->id);

        $this->assertResponseStatus(404);
    }
}
