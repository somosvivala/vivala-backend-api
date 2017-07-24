<?php

use App\Models\CotacaoAereo;
use App\Repositories\CotacaoAereoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoAereoRepositoryTest extends TestCase
{
    use MakeCotacaoAereoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoAereoRepository
     */
    protected $cotacaoAereoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoAereoRepo = App::make(CotacaoAereoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoAereo()
    {
        $cotacaoAereo = $this->fakeCotacaoAereoData();
        $createdCotacaoAereo = $this->cotacaoAereoRepo->create($cotacaoAereo);
        $createdCotacaoAereo = $createdCotacaoAereo->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoAereo);
        $this->assertNotNull($createdCotacaoAereo['id'], 'Created CotacaoAereo must have id specified');
        $this->assertNotNull(CotacaoAereo::find($createdCotacaoAereo['id']), 'CotacaoAereo with given id must be in DB');
        $this->assertModelData($cotacaoAereo, $createdCotacaoAereo);
    }

    /**
     * @test read
     */
    public function testReadCotacaoAereo()
    {
        $cotacaoAereo = $this->makeCotacaoAereo();
        $dbCotacaoAereo = $this->cotacaoAereoRepo->find($cotacaoAereo->id);
        $dbCotacaoAereo = $dbCotacaoAereo->toArray();
        $this->assertModelData($cotacaoAereo->toArray(), $dbCotacaoAereo);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoAereo()
    {
        $cotacaoAereo = $this->makeCotacaoAereo();
        $fakeCotacaoAereo = $this->fakeCotacaoAereoData();
        $updatedCotacaoAereo = $this->cotacaoAereoRepo->update($fakeCotacaoAereo, $cotacaoAereo->id);
        $this->assertModelData($fakeCotacaoAereo, $updatedCotacaoAereo->toArray());
        $dbCotacaoAereo = $this->cotacaoAereoRepo->find($cotacaoAereo->id);
        $this->assertModelData($fakeCotacaoAereo, $dbCotacaoAereo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoAereo()
    {
        $cotacaoAereo = $this->makeCotacaoAereo();
        $resp = $this->cotacaoAereoRepo->delete($cotacaoAereo->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoAereo::find($cotacaoAereo->id), 'CotacaoAereo should not exist in DB');
    }
}
