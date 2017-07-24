<?php

use App\Models\CotacaoHospedagem;
use App\Repositories\CotacaoHospedagemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoHospedagemRepositoryTest extends TestCase
{
    use MakeCotacaoHospedagemTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoHospedagemRepository
     */
    protected $cotacaoHospedagemRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoHospedagemRepo = App::make(CotacaoHospedagemRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->fakeCotacaoHospedagemData();
        $createdCotacaoHospedagem = $this->cotacaoHospedagemRepo->create($cotacaoHospedagem);
        $createdCotacaoHospedagem = $createdCotacaoHospedagem->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoHospedagem);
        $this->assertNotNull($createdCotacaoHospedagem['id'], 'Created CotacaoHospedagem must have id specified');
        $this->assertNotNull(CotacaoHospedagem::find($createdCotacaoHospedagem['id']), 'CotacaoHospedagem with given id must be in DB');
        $this->assertModelData($cotacaoHospedagem, $createdCotacaoHospedagem);
    }

    /**
     * @test read
     */
    public function testReadCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->makeCotacaoHospedagem();
        $dbCotacaoHospedagem = $this->cotacaoHospedagemRepo->find($cotacaoHospedagem->id);
        $dbCotacaoHospedagem = $dbCotacaoHospedagem->toArray();
        $this->assertModelData($cotacaoHospedagem->toArray(), $dbCotacaoHospedagem);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->makeCotacaoHospedagem();
        $fakeCotacaoHospedagem = $this->fakeCotacaoHospedagemData();
        $updatedCotacaoHospedagem = $this->cotacaoHospedagemRepo->update($fakeCotacaoHospedagem, $cotacaoHospedagem->id);
        $this->assertModelData($fakeCotacaoHospedagem, $updatedCotacaoHospedagem->toArray());
        $dbCotacaoHospedagem = $this->cotacaoHospedagemRepo->find($cotacaoHospedagem->id);
        $this->assertModelData($fakeCotacaoHospedagem, $dbCotacaoHospedagem->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoHospedagem()
    {
        $cotacaoHospedagem = $this->makeCotacaoHospedagem();
        $resp = $this->cotacaoHospedagemRepo->delete($cotacaoHospedagem->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoHospedagem::find($cotacaoHospedagem->id), 'CotacaoHospedagem should not exist in DB');
    }
}
