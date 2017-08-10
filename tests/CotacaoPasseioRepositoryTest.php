<?php

use App\Models\CotacaoPasseio;
use App\Repositories\CotacaoPasseioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoPasseioRepositoryTest extends TestCase
{
    use MakeCotacaoPasseioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoPasseioRepository
     */
    protected $cotacaoPasseioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoPasseioRepo = App::make(CotacaoPasseioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoPasseio()
    {
        $cotacaoPasseio = $this->fakeCotacaoPasseioData();
        $createdCotacaoPasseio = $this->cotacaoPasseioRepo->create($cotacaoPasseio);
        $createdCotacaoPasseio = $createdCotacaoPasseio->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoPasseio);
        $this->assertNotNull($createdCotacaoPasseio['id'], 'Created CotacaoPasseio must have id specified');
        $this->assertNotNull(CotacaoPasseio::find($createdCotacaoPasseio['id']), 'CotacaoPasseio with given id must be in DB');
        $this->assertModelData($cotacaoPasseio, $createdCotacaoPasseio);
    }

    /**
     * @test read
     */
    public function testReadCotacaoPasseio()
    {
        $cotacaoPasseio = $this->makeCotacaoPasseio();
        $dbCotacaoPasseio = $this->cotacaoPasseioRepo->find($cotacaoPasseio->id);
        $dbCotacaoPasseio = $dbCotacaoPasseio->toArray();
        $this->assertModelData($cotacaoPasseio->toArray(), $dbCotacaoPasseio);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoPasseio()
    {
        $cotacaoPasseio = $this->makeCotacaoPasseio();
        $fakeCotacaoPasseio = $this->fakeCotacaoPasseioData();
        $updatedCotacaoPasseio = $this->cotacaoPasseioRepo->update($fakeCotacaoPasseio, $cotacaoPasseio->id);
        $this->assertModelData($fakeCotacaoPasseio, $updatedCotacaoPasseio->toArray());
        $dbCotacaoPasseio = $this->cotacaoPasseioRepo->find($cotacaoPasseio->id);
        $this->assertModelData($fakeCotacaoPasseio, $dbCotacaoPasseio->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoPasseio()
    {
        $cotacaoPasseio = $this->makeCotacaoPasseio();
        $resp = $this->cotacaoPasseioRepo->delete($cotacaoPasseio->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoPasseio::find($cotacaoPasseio->id), 'CotacaoPasseio should not exist in DB');
    }
}
