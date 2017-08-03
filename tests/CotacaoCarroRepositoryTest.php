<?php

use App\Models\CotacaoCarro;
use App\Repositories\CotacaoCarroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoCarroRepositoryTest extends TestCase
{
    use MakeCotacaoCarroTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoCarroRepository
     */
    protected $cotacaoCarroRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoCarroRepo = App::make(CotacaoCarroRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoCarro()
    {
        $cotacaoCarro = $this->fakeCotacaoCarroData();
        $createdCotacaoCarro = $this->cotacaoCarroRepo->create($cotacaoCarro);
        $createdCotacaoCarro = $createdCotacaoCarro->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoCarro);
        $this->assertNotNull($createdCotacaoCarro['id'], 'Created CotacaoCarro must have id specified');
        $this->assertNotNull(CotacaoCarro::find($createdCotacaoCarro['id']), 'CotacaoCarro with given id must be in DB');
        $this->assertModelData($cotacaoCarro, $createdCotacaoCarro);
    }

    /**
     * @test read
     */
    public function testReadCotacaoCarro()
    {
        $cotacaoCarro = $this->makeCotacaoCarro();
        $dbCotacaoCarro = $this->cotacaoCarroRepo->find($cotacaoCarro->id);
        $dbCotacaoCarro = $dbCotacaoCarro->toArray();
        $this->assertModelData($cotacaoCarro->toArray(), $dbCotacaoCarro);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoCarro()
    {
        $cotacaoCarro = $this->makeCotacaoCarro();
        $fakeCotacaoCarro = $this->fakeCotacaoCarroData();
        $updatedCotacaoCarro = $this->cotacaoCarroRepo->update($fakeCotacaoCarro, $cotacaoCarro->id);
        $this->assertModelData($fakeCotacaoCarro, $updatedCotacaoCarro->toArray());
        $dbCotacaoCarro = $this->cotacaoCarroRepo->find($cotacaoCarro->id);
        $this->assertModelData($fakeCotacaoCarro, $dbCotacaoCarro->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoCarro()
    {
        $cotacaoCarro = $this->makeCotacaoCarro();
        $resp = $this->cotacaoCarroRepo->delete($cotacaoCarro->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoCarro::find($cotacaoCarro->id), 'CotacaoCarro should not exist in DB');
    }
}
