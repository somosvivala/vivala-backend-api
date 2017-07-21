<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscricaoExpedicaoApiTest extends TestCase
{
    use MakeInscricaoExpedicaoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->fakeInscricaoExpedicaoData();
        $this->json('POST', '/api/v1/inscricaoExpedicaos', $inscricaoExpedicao);

        $this->assertApiResponse($inscricaoExpedicao);
    }

    /**
     * @test
     */
    public function testReadInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->makeInscricaoExpedicao();
        $this->json('GET', '/api/v1/inscricaoExpedicaos/'.$inscricaoExpedicao->id);

        $this->assertApiResponse($inscricaoExpedicao->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->makeInscricaoExpedicao();
        $editedInscricaoExpedicao = $this->fakeInscricaoExpedicaoData();

        $this->json('PUT', '/api/v1/inscricaoExpedicaos/'.$inscricaoExpedicao->id, $editedInscricaoExpedicao);

        $this->assertApiResponse($editedInscricaoExpedicao);
    }

    /**
     * @test
     */
    public function testDeleteInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->makeInscricaoExpedicao();
        $this->json('DELETE', '/api/v1/inscricaoExpedicaos/'.$inscricaoExpedicao->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inscricaoExpedicaos/'.$inscricaoExpedicao->id);

        $this->assertResponseStatus(404);
    }
}
