<?php

use App\Models\CotacaoRodoviario;
use App\Repositories\CotacaoRodoviarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoRodoviarioRepositoryTest extends TestCase
{
    use MakeCotacaoRodoviarioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoRodoviarioRepository
     */
    protected $cotacaoRodoviarioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoRodoviarioRepo = App::make(CotacaoRodoviarioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->fakeCotacaoRodoviarioData();
        $createdCotacaoRodoviario = $this->cotacaoRodoviarioRepo->create($cotacaoRodoviario);
        $createdCotacaoRodoviario = $createdCotacaoRodoviario->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoRodoviario);
        $this->assertNotNull($createdCotacaoRodoviario['id'], 'Created CotacaoRodoviario must have id specified');
        $this->assertNotNull(CotacaoRodoviario::find($createdCotacaoRodoviario['id']), 'CotacaoRodoviario with given id must be in DB');
        $this->assertModelData($cotacaoRodoviario, $createdCotacaoRodoviario);
    }

    /**
     * @test read
     */
    public function testReadCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->makeCotacaoRodoviario();
        $dbCotacaoRodoviario = $this->cotacaoRodoviarioRepo->find($cotacaoRodoviario->id);
        $dbCotacaoRodoviario = $dbCotacaoRodoviario->toArray();
        $this->assertModelData($cotacaoRodoviario->toArray(), $dbCotacaoRodoviario);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->makeCotacaoRodoviario();
        $fakeCotacaoRodoviario = $this->fakeCotacaoRodoviarioData();
        $updatedCotacaoRodoviario = $this->cotacaoRodoviarioRepo->update($fakeCotacaoRodoviario, $cotacaoRodoviario->id);
        $this->assertModelData($fakeCotacaoRodoviario, $updatedCotacaoRodoviario->toArray());
        $dbCotacaoRodoviario = $this->cotacaoRodoviarioRepo->find($cotacaoRodoviario->id);
        $this->assertModelData($fakeCotacaoRodoviario, $dbCotacaoRodoviario->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoRodoviario()
    {
        $cotacaoRodoviario = $this->makeCotacaoRodoviario();
        $resp = $this->cotacaoRodoviarioRepo->delete($cotacaoRodoviario->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoRodoviario::find($cotacaoRodoviario->id), 'CotacaoRodoviario should not exist in DB');
    }
}
