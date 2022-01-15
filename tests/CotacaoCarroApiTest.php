<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CotacaoCarroApiTest extends TestCase
{
    use MakeCotacaoCarroTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoCarro()
    {
        $cotacaoCarro = $this->fakeCotacaoCarroData();
        $this->json('POST', '/api/v1/cotacaoCarros', $cotacaoCarro);

        $this->assertApiResponse($cotacaoCarro);
    }

    /**
     * @test
     */
    public function testReadCotacaoCarro()
    {
        $cotacaoCarro = $this->makeCotacaoCarro();
        $this->json('GET', '/api/v1/cotacaoCarros/'.$cotacaoCarro->id);

        $this->assertApiResponse($cotacaoCarro->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoCarro()
    {
        $cotacaoCarro = $this->makeCotacaoCarro();
        $editedCotacaoCarro = $this->fakeCotacaoCarroData();

        $this->json('PUT', '/api/v1/cotacaoCarros/'.$cotacaoCarro->id, $editedCotacaoCarro);

        $this->assertApiResponse($editedCotacaoCarro);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoCarro()
    {
        $cotacaoCarro = $this->makeCotacaoCarro();
        $this->json('DELETE', '/api/v1/cotacaoCarros/'.$cotacaoCarro->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoCarros/'.$cotacaoCarro->id);

        $this->assertResponseStatus(404);
    }
}
