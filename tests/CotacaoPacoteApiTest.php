<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CotacaoPacoteApiTest extends TestCase
{
    use MakeCotacaoPacoteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCotacaoPacote()
    {
        $cotacaoPacote = $this->fakeCotacaoPacoteData();
        $this->json('POST', '/api/v1/cotacaoPacotes', $cotacaoPacote);

        $this->assertApiResponse($cotacaoPacote);
    }

    /**
     * @test
     */
    public function testReadCotacaoPacote()
    {
        $cotacaoPacote = $this->makeCotacaoPacote();
        $this->json('GET', '/api/v1/cotacaoPacotes/'.$cotacaoPacote->id);

        $this->assertApiResponse($cotacaoPacote->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCotacaoPacote()
    {
        $cotacaoPacote = $this->makeCotacaoPacote();
        $editedCotacaoPacote = $this->fakeCotacaoPacoteData();

        $this->json('PUT', '/api/v1/cotacaoPacotes/'.$cotacaoPacote->id, $editedCotacaoPacote);

        $this->assertApiResponse($editedCotacaoPacote);
    }

    /**
     * @test
     */
    public function testDeleteCotacaoPacote()
    {
        $cotacaoPacote = $this->makeCotacaoPacote();
        $this->json('DELETE', '/api/v1/cotacaoPacotes/'.$cotacaoPacote->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cotacaoPacotes/'.$cotacaoPacote->id);

        $this->assertResponseStatus(404);
    }
}
