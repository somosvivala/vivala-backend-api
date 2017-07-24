<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoAereoApiTest extends TestCase
{
    use MakeCotacaoAereoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoAereo()
    {
        $cotacaoAereo = $this->fakeCotacaoAereoData();
        $this->json('POST', '/api/v1/cotacaoAereos', $cotacaoAereo);

        $this->assertApiResponse($cotacaoAereo);
    }

    /**
     * @test
     */
    public function testReadCotacaoAereo()
    {
        $cotacaoAereo = $this->makeCotacaoAereo();
        $this->json('GET', '/api/v1/cotacaoAereos/'.$cotacaoAereo->id);

        $this->assertApiResponse($cotacaoAereo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoAereo()
    {
        $cotacaoAereo = $this->makeCotacaoAereo();
        $editedCotacaoAereo = $this->fakeCotacaoAereoData();

        $this->json('PUT', '/api/v1/cotacaoAereos/'.$cotacaoAereo->id, $editedCotacaoAereo);

        $this->assertApiResponse($editedCotacaoAereo);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoAereo()
    {
        $cotacaoAereo = $this->makeCotacaoAereo();
        $this->json('DELETE', '/api/v1/cotacaoAereos/'.$cotacaoAereo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoAereos/'.$cotacaoAereo->id);

        $this->assertResponseStatus(404);
    }
}
