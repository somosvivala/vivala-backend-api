<?php

use App\Models\CotacaoSeguro;
use App\Repositories\CotacaoSeguroRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoSeguroRepositoryTest extends TestCase
{
    use MakeCotacaoSeguroTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoSeguroRepository
     */
    protected $cotacaoSeguroRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoSeguroRepo = App::make(CotacaoSeguroRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoSeguro()
    {
        $cotacaoSeguro = $this->fakeCotacaoSeguroData();
        $createdCotacaoSeguro = $this->cotacaoSeguroRepo->create($cotacaoSeguro);
        $createdCotacaoSeguro = $createdCotacaoSeguro->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoSeguro);
        $this->assertNotNull($createdCotacaoSeguro['id'], 'Created CotacaoSeguro must have id specified');
        $this->assertNotNull(CotacaoSeguro::find($createdCotacaoSeguro['id']), 'CotacaoSeguro with given id must be in DB');
        $this->assertModelData($cotacaoSeguro, $createdCotacaoSeguro);
    }

    /**
     * @test read
     */
    public function testReadCotacaoSeguro()
    {
        $cotacaoSeguro = $this->makeCotacaoSeguro();
        $dbCotacaoSeguro = $this->cotacaoSeguroRepo->find($cotacaoSeguro->id);
        $dbCotacaoSeguro = $dbCotacaoSeguro->toArray();
        $this->assertModelData($cotacaoSeguro->toArray(), $dbCotacaoSeguro);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoSeguro()
    {
        $cotacaoSeguro = $this->makeCotacaoSeguro();
        $fakeCotacaoSeguro = $this->fakeCotacaoSeguroData();
        $updatedCotacaoSeguro = $this->cotacaoSeguroRepo->update($fakeCotacaoSeguro, $cotacaoSeguro->id);
        $this->assertModelData($fakeCotacaoSeguro, $updatedCotacaoSeguro->toArray());
        $dbCotacaoSeguro = $this->cotacaoSeguroRepo->find($cotacaoSeguro->id);
        $this->assertModelData($fakeCotacaoSeguro, $dbCotacaoSeguro->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoSeguro()
    {
        $cotacaoSeguro = $this->makeCotacaoSeguro();
        $resp = $this->cotacaoSeguroRepo->delete($cotacaoSeguro->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoSeguro::find($cotacaoSeguro->id), 'CotacaoSeguro should not exist in DB');
    }
}
