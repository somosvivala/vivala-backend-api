<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoSeguroApiTest extends TestCase
{
    use MakeCotacaoSeguroTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoSeguro()
    {
        $cotacaoSeguro = $this->fakeCotacaoSeguroData();
        $this->json('POST', '/api/v1/cotacaoSeguros', $cotacaoSeguro);

        $this->assertApiResponse($cotacaoSeguro);
    }

    /**
     * @test
     */
    public function testReadCotacaoSeguro()
    {
        $cotacaoSeguro = $this->makeCotacaoSeguro();
        $this->json('GET', '/api/v1/cotacaoSeguros/'.$cotacaoSeguro->id);

        $this->assertApiResponse($cotacaoSeguro->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoSeguro()
    {
        $cotacaoSeguro = $this->makeCotacaoSeguro();
        $editedCotacaoSeguro = $this->fakeCotacaoSeguroData();

        $this->json('PUT', '/api/v1/cotacaoSeguros/'.$cotacaoSeguro->id, $editedCotacaoSeguro);

        $this->assertApiResponse($editedCotacaoSeguro);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoSeguro()
    {
        $cotacaoSeguro = $this->makeCotacaoSeguro();
        $this->json('DELETE', '/api/v1/cotacaoSeguros/'.$cotacaoSeguro->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoSeguros/'.$cotacaoSeguro->id);

        $this->assertResponseStatus(404);
    }
}
