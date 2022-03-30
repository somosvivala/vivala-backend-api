<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ContatoCorporativoApiTest extends TestCase
{
    use MakeContatoCorporativoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateContatoCorporativo()
    {
        $contatoCorporativo = $this->fakeContatoCorporativoData();
        $this->json('POST', '/api/v1/contatoCorporativos', $contatoCorporativo);

        $this->assertApiResponse($contatoCorporativo);
    }

    /**
     * @test
     */
    public function testReadContatoCorporativo()
    {
        $contatoCorporativo = $this->makeContatoCorporativo();
        $this->json('GET', '/api/v1/contatoCorporativos/'.$contatoCorporativo->id);

        $this->assertApiResponse($contatoCorporativo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateContatoCorporativo()
    {
        $contatoCorporativo = $this->makeContatoCorporativo();
        $editedContatoCorporativo = $this->fakeContatoCorporativoData();

        $this->json('PUT', '/api/v1/contatoCorporativos/'.$contatoCorporativo->id, $editedContatoCorporativo);

        $this->assertApiResponse($editedContatoCorporativo);
    }

    /**
     * @test
     */
    public function testDeleteContatoCorporativo()
    {
        $contatoCorporativo = $this->makeContatoCorporativo();
        $this->json('DELETE', '/api/v1/contatoCorporativos/'.$contatoCorporativo->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/contatoCorporativos/'.$contatoCorporativo->id);

        $this->assertResponseStatus(404);
    }
}
