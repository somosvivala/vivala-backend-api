<?php

use App\Models\ContatoGeral;
use App\Repositories\ContatoGeralRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContatoGeralRepositoryTest extends TestCase
{
    use MakeContatoGeralTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContatoGeralRepository
     */
    protected $contatoGeralRepo;

    public function setUp()
    {
        parent::setUp();
        $this->contatoGeralRepo = App::make(ContatoGeralRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateContatoGeral()
    {
        $contatoGeral = $this->fakeContatoGeralData();
        $createdContatoGeral = $this->contatoGeralRepo->create($contatoGeral);
        $createdContatoGeral = $createdContatoGeral->toArray();
        $this->assertArrayHasKey('id', $createdContatoGeral);
        $this->assertNotNull($createdContatoGeral['id'], 'Created ContatoGeral must have id specified');
        $this->assertNotNull(ContatoGeral::find($createdContatoGeral['id']), 'ContatoGeral with given id must be in DB');
        $this->assertModelData($contatoGeral, $createdContatoGeral);
    }

    /**
     * @test read
     */
    public function testReadContatoGeral()
    {
        $contatoGeral = $this->makeContatoGeral();
        $dbContatoGeral = $this->contatoGeralRepo->find($contatoGeral->id);
        $dbContatoGeral = $dbContatoGeral->toArray();
        $this->assertModelData($contatoGeral->toArray(), $dbContatoGeral);
    }

    /**
     * @test update
     */
    public function testUpdateContatoGeral()
    {
        $contatoGeral = $this->makeContatoGeral();
        $fakeContatoGeral = $this->fakeContatoGeralData();
        $updatedContatoGeral = $this->contatoGeralRepo->update($fakeContatoGeral, $contatoGeral->id);
        $this->assertModelData($fakeContatoGeral, $updatedContatoGeral->toArray());
        $dbContatoGeral = $this->contatoGeralRepo->find($contatoGeral->id);
        $this->assertModelData($fakeContatoGeral, $dbContatoGeral->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteContatoGeral()
    {
        $contatoGeral = $this->makeContatoGeral();
        $resp = $this->contatoGeralRepo->delete($contatoGeral->id);
        $this->assertTrue($resp);
        $this->assertNull(ContatoGeral::find($contatoGeral->id), 'ContatoGeral should not exist in DB');
    }
}
