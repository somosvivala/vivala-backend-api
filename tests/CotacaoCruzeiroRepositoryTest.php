<?php

use App\Models\CotacaoCruzeiro;
use App\Repositories\CotacaoCruzeiroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoCruzeiroRepositoryTest extends TestCase
{
    use MakeCotacaoCruzeiroTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoCruzeiroRepository
     */
    protected $cotacaoCruzeiroRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoCruzeiroRepo = App::make(CotacaoCruzeiroRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->fakeCotacaoCruzeiroData();
        $createdCotacaoCruzeiro = $this->cotacaoCruzeiroRepo->create($cotacaoCruzeiro);
        $createdCotacaoCruzeiro = $createdCotacaoCruzeiro->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoCruzeiro);
        $this->assertNotNull($createdCotacaoCruzeiro['id'], 'Created CotacaoCruzeiro must have id specified');
        $this->assertNotNull(CotacaoCruzeiro::find($createdCotacaoCruzeiro['id']), 'CotacaoCruzeiro with given id must be in DB');
        $this->assertModelData($cotacaoCruzeiro, $createdCotacaoCruzeiro);
    }

    /**
     * @test read
     */
    public function testReadCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->makeCotacaoCruzeiro();
        $dbCotacaoCruzeiro = $this->cotacaoCruzeiroRepo->find($cotacaoCruzeiro->id);
        $dbCotacaoCruzeiro = $dbCotacaoCruzeiro->toArray();
        $this->assertModelData($cotacaoCruzeiro->toArray(), $dbCotacaoCruzeiro);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->makeCotacaoCruzeiro();
        $fakeCotacaoCruzeiro = $this->fakeCotacaoCruzeiroData();
        $updatedCotacaoCruzeiro = $this->cotacaoCruzeiroRepo->update($fakeCotacaoCruzeiro, $cotacaoCruzeiro->id);
        $this->assertModelData($fakeCotacaoCruzeiro, $updatedCotacaoCruzeiro->toArray());
        $dbCotacaoCruzeiro = $this->cotacaoCruzeiroRepo->find($cotacaoCruzeiro->id);
        $this->assertModelData($fakeCotacaoCruzeiro, $dbCotacaoCruzeiro->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoCruzeiro()
    {
        $cotacaoCruzeiro = $this->makeCotacaoCruzeiro();
        $resp = $this->cotacaoCruzeiroRepo->delete($cotacaoCruzeiro->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoCruzeiro::find($cotacaoCruzeiro->id), 'CotacaoCruzeiro should not exist in DB');
    }
}
