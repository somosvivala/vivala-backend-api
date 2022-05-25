<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CotacaoRodoviarioApiTest extends TestCase
{
    use MakeCotacaoRodoviarioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->fakeCotacaoRodoviarioData();
        $this->json('POST', '/api/v1/cotacaoRodoviarios', $cotacaoRodoviario);

        $this->assertApiResponse($cotacaoRodoviario);
    }

    /**
     * @test
     */
    public function testReadCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->makeCotacaoRodoviario();
        $this->json('GET', '/api/v1/cotacaoRodoviarios/'.$cotacaoRodoviario->id);

        $this->assertApiResponse($cotacaoRodoviario->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->makeCotacaoRodoviario();
        $editedCotacaoRodoviario = $this->fakeCotacaoRodoviarioData();

        $this->json('PUT', '/api/v1/cotacaoRodoviarios/'.$cotacaoRodoviario->id, $editedCotacaoRodoviario);

        $this->assertApiResponse($editedCotacaoRodoviario);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->makeCotacaoRodoviario();
        $this->json('DELETE', '/api/v1/cotacaoRodoviarios/'.$cotacaoRodoviario->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoRodoviarios/'.$cotacaoRodoviario->id);

        $this->assertResponseStatus(404);
    }
}
