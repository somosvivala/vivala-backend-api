<?php

use App\Models\InscricaoExpedicao;
use App\Repositories\InscricaoExpedicaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscricaoExpedicaoRepositoryTest extends TestCase
{
    use MakeInscricaoExpedicaoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InscricaoExpedicaoRepository
     */
    protected $inscricaoExpedicaoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inscricaoExpedicaoRepo = App::make(InscricaoExpedicaoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->fakeInscricaoExpedicaoData();
        $createdInscricaoExpedicao = $this->inscricaoExpedicaoRepo->create($inscricaoExpedicao);
        $createdInscricaoExpedicao = $createdInscricaoExpedicao->toArray();
        $this->assertArrayHasKey('id', $createdInscricaoExpedicao);
        $this->assertNotNull($createdInscricaoExpedicao['id'], 'Created InscricaoExpedicao must have id specified');
        $this->assertNotNull(InscricaoExpedicao::find($createdInscricaoExpedicao['id']), 'InscricaoExpedicao with given id must be in DB');
        $this->assertModelData($inscricaoExpedicao, $createdInscricaoExpedicao);
    }

    /**
     * @test read
     */
    public function testReadInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->makeInscricaoExpedicao();
        $dbInscricaoExpedicao = $this->inscricaoExpedicaoRepo->find($inscricaoExpedicao->id);
        $dbInscricaoExpedicao = $dbInscricaoExpedicao->toArray();
        $this->assertModelData($inscricaoExpedicao->toArray(), $dbInscricaoExpedicao);
    }

    /**
     * @test update
     */
    public function testUpdateInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->makeInscricaoExpedicao();
        $fakeInscricaoExpedicao = $this->fakeInscricaoExpedicaoData();
        $updatedInscricaoExpedicao = $this->inscricaoExpedicaoRepo->update($fakeInscricaoExpedicao, $inscricaoExpedicao->id);
        $this->assertModelData($fakeInscricaoExpedicao, $updatedInscricaoExpedicao->toArray());
        $dbInscricaoExpedicao = $this->inscricaoExpedicaoRepo->find($inscricaoExpedicao->id);
        $this->assertModelData($fakeInscricaoExpedicao, $dbInscricaoExpedicao->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInscricaoExpedicao()
    {
        $inscricaoExpedicao = $this->makeInscricaoExpedicao();
        $resp = $this->inscricaoExpedicaoRepo->delete($inscricaoExpedicao->id);
        $this->assertTrue($resp);
        $this->assertNull(InscricaoExpedicao::find($inscricaoExpedicao->id), 'InscricaoExpedicao should not exist in DB');
    }
}
