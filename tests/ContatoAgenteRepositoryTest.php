<?php

use App\Models\ContatoAgente;
use App\Repositories\ContatoAgenteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContatoAgenteRepositoryTest extends TestCase
{
    use MakeContatoAgenteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContatoAgenteRepository
     */
    protected $contatoAgenteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->contatoAgenteRepo = App::make(ContatoAgenteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateContatoAgente()
    {
        $contatoAgente = $this->fakeContatoAgenteData();
        $createdContatoAgente = $this->contatoAgenteRepo->create($contatoAgente);
        $createdContatoAgente = $createdContatoAgente->toArray();
        $this->assertArrayHasKey('id', $createdContatoAgente);
        $this->assertNotNull($createdContatoAgente['id'], 'Created ContatoAgente must have id specified');
        $this->assertNotNull(ContatoAgente::find($createdContatoAgente['id']), 'ContatoAgente with given id must be in DB');
        $this->assertModelData($contatoAgente, $createdContatoAgente);
    }

    /**
     * @test read
     */
    public function testReadContatoAgente()
    {
        $contatoAgente = $this->makeContatoAgente();
        $dbContatoAgente = $this->contatoAgenteRepo->find($contatoAgente->id);
        $dbContatoAgente = $dbContatoAgente->toArray();
        $this->assertModelData($contatoAgente->toArray(), $dbContatoAgente);
    }

    /**
     * @test update
     */
    public function testUpdateContatoAgente()
    {
        $contatoAgente = $this->makeContatoAgente();
        $fakeContatoAgente = $this->fakeContatoAgenteData();
        $updatedContatoAgente = $this->contatoAgenteRepo->update($fakeContatoAgente, $contatoAgente->id);
        $this->assertModelData($fakeContatoAgente, $updatedContatoAgente->toArray());
        $dbContatoAgente = $this->contatoAgenteRepo->find($contatoAgente->id);
        $this->assertModelData($fakeContatoAgente, $dbContatoAgente->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteContatoAgente()
    {
        $contatoAgente = $this->makeContatoAgente();
        $resp = $this->contatoAgenteRepo->delete($contatoAgente->id);
        $this->assertTrue($resp);
        $this->assertNull(ContatoAgente::find($contatoAgente->id), 'ContatoAgente should not exist in DB');
    }
}
