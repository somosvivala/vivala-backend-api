<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoCruzeiroApiTest extends TestCase
{
    use MakeCotacaoCruzeiroTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->fakeCotacaoCruzeiroData();
        $this->json('POST', '/api/v1/cotacaoCruzeiros', $cotacaoCruzeiro);

        $this->assertApiResponse($cotacaoCruzeiro);
    }

    /**
     * @test
     */
    public function testReadCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->makeCotacaoCruzeiro();
        $this->json('GET', '/api/v1/cotacaoCruzeiros/'.$cotacaoCruzeiro->id);

        $this->assertApiResponse($cotacaoCruzeiro->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->makeCotacaoCruzeiro();
        $editedCotacaoCruzeiro = $this->fakeCotacaoCruzeiroData();

        $this->json('PUT', '/api/v1/cotacaoCruzeiros/'.$cotacaoCruzeiro->id, $editedCotacaoCruzeiro);

        $this->assertApiResponse($editedCotacaoCruzeiro);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->makeCotacaoCruzeiro();
        $this->json('DELETE', '/api/v1/cotacaoCruzeiros/'.$cotacaoCruzeiro->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoCruzeiros/'.$cotacaoCruzeiro->id);

        $this->assertResponseStatus(404);
    }
}
