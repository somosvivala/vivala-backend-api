<?php

use App\Models\CotacaoPacote;
use App\Repositories\CotacaoPacoteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CotacaoPacoteRepositoryTest extends TestCase
{
    use MakeCotacaoPacoteTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CotacaoPacoteRepository
     */
    protected $cotacaoPacoteRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cotacaoPacoteRepo = App::make(CotacaoPacoteRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCotacaoPacote()
    {
        $cotacaoPacote = $this->fakeCotacaoPacoteData();
        $createdCotacaoPacote = $this->cotacaoPacoteRepo->create($cotacaoPacote);
        $createdCotacaoPacote = $createdCotacaoPacote->toArray();
        $this->assertArrayHasKey('id', $createdCotacaoPacote);
        $this->assertNotNull($createdCotacaoPacote['id'], 'Created CotacaoPacote must have id specified');
        $this->assertNotNull(CotacaoPacote::find($createdCotacaoPacote['id']), 'CotacaoPacote with given id must be in DB');
        $this->assertModelData($cotacaoPacote, $createdCotacaoPacote);
    }

    /**
     * @test read
     */
    public function testReadCotacaoPacote()
    {
        $cotacaoPacote = $this->makeCotacaoPacote();
        $dbCotacaoPacote = $this->cotacaoPacoteRepo->find($cotacaoPacote->id);
        $dbCotacaoPacote = $dbCotacaoPacote->toArray();
        $this->assertModelData($cotacaoPacote->toArray(), $dbCotacaoPacote);
    }

    /**
     * @test update
     */
    public function testUpdateCotacaoPacote()
    {
        $cotacaoPacote = $this->makeCotacaoPacote();
        $fakeCotacaoPacote = $this->fakeCotacaoPacoteData();
        $updatedCotacaoPacote = $this->cotacaoPacoteRepo->update($fakeCotacaoPacote, $cotacaoPacote->id);
        $this->assertModelData($fakeCotacaoPacote, $updatedCotacaoPacote->toArray());
        $dbCotacaoPacote = $this->cotacaoPacoteRepo->find($cotacaoPacote->id);
        $this->assertModelData($fakeCotacaoPacote, $dbCotacaoPacote->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCotacaoPacote()
    {
        $cotacaoPacote = $this->makeCotacaoPacote();
        $resp = $this->cotacaoPacoteRepo->delete($cotacaoPacote->id);
        $this->assertTrue($resp);
        $this->assertNull(CotacaoPacote::find($cotacaoPacote->id), 'CotacaoPacote should not exist in DB');
    }
}
