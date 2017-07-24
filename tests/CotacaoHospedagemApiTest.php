<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoHospedagemApiTest extends TestCase
{
    use MakeCotacaoHospedagemTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->fakeCotacaoHospedagemData();
        $this->json('POST', '/api/v1/cotacaoHospedagems', $cotacaoHospedagem);

        $this->assertApiResponse($cotacaoHospedagem);
    }

    /**
     * @test
     */
    public function testReadCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->makeCotacaoHospedagem();
        $this->json('GET', '/api/v1/cotacaoHospedagems/'.$cotacaoHospedagem->id);

        $this->assertApiResponse($cotacaoHospedagem->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->makeCotacaoHospedagem();
        $editedCotacaoHospedagem = $this->fakeCotacaoHospedagemData();

        $this->json('PUT', '/api/v1/cotacaoHospedagems/'.$cotacaoHospedagem->id, $editedCotacaoHospedagem);

        $this->assertApiResponse($editedCotacaoHospedagem);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->makeCotacaoHospedagem();
        $this->json('DELETE', '/api/v1/cotacaoHospedagems/'.$cotacaoHospedagem->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoHospedagems/'.$cotacaoHospedagem->id);

        $this->assertResponseStatus(404);
    }
}
