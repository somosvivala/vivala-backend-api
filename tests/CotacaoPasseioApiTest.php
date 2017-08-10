<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoPasseioApiTest extends TestCase
{
    use MakeCotacaoPasseioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoPasseio()
    {
        $cotacaoPasseio = $this->fakeCotacaoPasseioData();
        $this->json('POST', '/api/v1/cotacaoPasseios', $cotacaoPasseio);

        $this->assertApiResponse($cotacaoPasseio);
    }

    /**
     * @test
     */
    public function testReadCotacaoPasseio()
    {
        $cotacaoPasseio = $this->makeCotacaoPasseio();
        $this->json('GET', '/api/v1/cotacaoPasseios/'.$cotacaoPasseio->id);

        $this->assertApiResponse($cotacaoPasseio->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoPasseio()
    {
        $cotacaoPasseio = $this->makeCotacaoPasseio();
        $editedCotacaoPasseio = $this->fakeCotacaoPasseioData();

        $this->json('PUT', '/api/v1/cotacaoPasseios/'.$cotacaoPasseio->id, $editedCotacaoPasseio);

        $this->assertApiResponse($editedCotacaoPasseio);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoPasseio()
    {
        $cotacaoPasseio = $this->makeCotacaoPasseio();
        $this->json('DELETE', '/api/v1/cotacaoPasseios/'.$cotacaoPasseio->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoPasseios/'.$cotacaoPasseio->id);

        $this->assertResponseStatus(404);
    }
}
