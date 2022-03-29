<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ContatoAgenteApiTest extends TestCase
{
    use MakeContatoAgenteTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateContatoAgente()
    {
        $contatoAgente = $this->fakeContatoAgenteData();
        $this->json('POST', '/api/v1/contatoAgentes', $contatoAgente);

        $this->assertApiResponse($contatoAgente);
    }

    /**
     * @test
     */
    public function testReadContatoAgente()
    {
        $contatoAgente = $this->makeContatoAgente();
        $this->json('GET', '/api/v1/contatoAgentes/'.$contatoAgente->id);

        $this->assertApiResponse($contatoAgente->toArray());
    }

    /**
     * @test
     */
    public function testUpdateContatoAgente()
    {
        $contatoAgente = $this->makeContatoAgente();
        $editedContatoAgente = $this->fakeContatoAgenteData();

        $this->json('PUT', '/api/v1/contatoAgentes/'.$contatoAgente->id, $editedContatoAgente);

        $this->assertApiResponse($editedContatoAgente);
    }

    /**
     * @test
     */
    public function testDeleteContatoAgente()
    {
        $contatoAgente = $this->makeContatoAgente();
        $this->json('DELETE', '/api/v1/contatoAgentes/'.$contatoAgente->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/contatoAgentes/'.$contatoAgente->id);

        $this->assertResponseStatus(404);
    }
}
