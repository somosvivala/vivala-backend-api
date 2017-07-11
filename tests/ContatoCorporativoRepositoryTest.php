<?php

use App\Models\ContatoCorporativo;
use App\Repositories\ContatoCorporativoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContatoCorporativoRepositoryTest extends TestCase
{
    use MakeContatoCorporativoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContatoCorporativoRepository
     */
    protected $contatoCorporativoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->contatoCorporativoRepo = App::make(ContatoCorporativoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateContatoCorporativo()
    {
        $contatoCorporativo = $this->fakeContatoCorporativoData();
        $createdContatoCorporativo = $this->contatoCorporativoRepo->create($contatoCorporativo);
        $createdContatoCorporativo = $createdContatoCorporativo->toArray();
        $this->assertArrayHasKey('id', $createdContatoCorporativo);
        $this->assertNotNull($createdContatoCorporativo['id'], 'Created ContatoCorporativo must have id specified');
        $this->assertNotNull(ContatoCorporativo::find($createdContatoCorporativo['id']), 'ContatoCorporativo with given id must be in DB');
        $this->assertModelData($contatoCorporativo, $createdContatoCorporativo);
    }

    /**
     * @test read
     */
    public function testReadContatoCorporativo()
    {
        $contatoCorporativo = $this->makeContatoCorporativo();
        $dbContatoCorporativo = $this->contatoCorporativoRepo->find($contatoCorporativo->id);
        $dbContatoCorporativo = $dbContatoCorporativo->toArray();
        $this->assertModelData($contatoCorporativo->toArray(), $dbContatoCorporativo);
    }

    /**
     * @test update
     */
    public function testUpdateContatoCorporativo()
    {
        $contatoCorporativo = $this->makeContatoCorporativo();
        $fakeContatoCorporativo = $this->fakeContatoCorporativoData();
        $updatedContatoCorporativo = $this->contatoCorporativoRepo->update($fakeContatoCorporativo, $contatoCorporativo->id);
        $this->assertModelData($fakeContatoCorporativo, $updatedContatoCorporativo->toArray());
        $dbContatoCorporativo = $this->contatoCorporativoRepo->find($contatoCorporativo->id);
        $this->assertModelData($fakeContatoCorporativo, $dbContatoCorporativo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteContatoCorporativo()
    {
        $contatoCorporativo = $this->makeContatoCorporativo();
        $resp = $this->contatoCorporativoRepo->delete($contatoCorporativo->id);
        $this->assertTrue($resp);
        $this->assertNull(ContatoCorporativo::find($contatoCorporativo->id), 'ContatoCorporativo should not exist in DB');
    }
}
