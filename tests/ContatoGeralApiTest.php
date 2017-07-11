<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContatoGeralApiTest extends TestCase
{
    use MakeContatoGeralTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateContatoGeral()
    {
        $contatoGeral = $this->fakeContatoGeralData();
        $this->json('POST', '/api/v1/contatoGerals', $contatoGeral);

        $this->assertApiResponse($contatoGeral);
    }

    /**
     * @test
     */
    public function testReadContatoGeral()
    {
        $contatoGeral = $this->makeContatoGeral();
        $this->json('GET', '/api/v1/contatoGerals/'.$contatoGeral->id);

        $this->assertApiResponse($contatoGeral->toArray());
    }

    /**
     * @test
     */
    public function testUpdateContatoGeral()
    {
        $contatoGeral = $this->makeContatoGeral();
        $editedContatoGeral = $this->fakeContatoGeralData();

        $this->json('PUT', '/api/v1/contatoGerals/'.$contatoGeral->id, $editedContatoGeral);

        $this->assertApiResponse($editedContatoGeral);
    }

    /**
     * @test
     */
    public function testDeleteContatoGeral()
    {
        $contatoGeral = $this->makeContatoGeral();
        $this->json('DELETE', '/api/v1/contatoGerals/'.$contatoGeral->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/contatoGerals/'.$contatoGeral->id);

        $this->assertResponseStatus(404);
    }
}
