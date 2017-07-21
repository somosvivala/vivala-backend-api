<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscricoesExpedicaoApiTest extends TestCase
{
    use MakeInscricoesExpedicaoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->fakeInscricoesExpedicaoData();
        $this->json('POST', '/api/v1/inscricoesExpedicaos', $inscricoesExpedicao);

        $this->assertApiResponse($inscricoesExpedicao);
    }

    /**
     * @test
     */
    public function testReadInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->makeInscricoesExpedicao();
        $this->json('GET', '/api/v1/inscricoesExpedicaos/'.$inscricoesExpedicao->id);

        $this->assertApiResponse($inscricoesExpedicao->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->makeInscricoesExpedicao();
        $editedInscricoesExpedicao = $this->fakeInscricoesExpedicaoData();

        $this->json('PUT', '/api/v1/inscricoesExpedicaos/'.$inscricoesExpedicao->id, $editedInscricoesExpedicao);

        $this->assertApiResponse($editedInscricoesExpedicao);
    }

    /**
     * @test
     */
    public function testDeleteInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->makeInscricoesExpedicao();
        $this->json('DELETE', '/api/v1/inscricoesExpedicaos/'.$inscricoesExpedicao->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/inscricoesExpedicaos/'.$inscricoesExpedicao->id);

        $this->assertResponseStatus(404);
    }
}
