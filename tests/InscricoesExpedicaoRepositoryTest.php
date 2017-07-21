<?php

use App\Models\InscricoesExpedicao;
use App\Repositories\InscricoesExpedicaoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscricoesExpedicaoRepositoryTest extends TestCase
{
    use MakeInscricoesExpedicaoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InscricoesExpedicaoRepository
     */
    protected $inscricoesExpedicaoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inscricoesExpedicaoRepo = App::make(InscricoesExpedicaoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->fakeInscricoesExpedicaoData();
        $createdInscricoesExpedicao = $this->inscricoesExpedicaoRepo->create($inscricoesExpedicao);
        $createdInscricoesExpedicao = $createdInscricoesExpedicao->toArray();
        $this->assertArrayHasKey('id', $createdInscricoesExpedicao);
        $this->assertNotNull($createdInscricoesExpedicao['id'], 'Created InscricoesExpedicao must have id specified');
        $this->assertNotNull(InscricoesExpedicao::find($createdInscricoesExpedicao['id']), 'InscricoesExpedicao with given id must be in DB');
        $this->assertModelData($inscricoesExpedicao, $createdInscricoesExpedicao);
    }

    /**
     * @test read
     */
    public function testReadInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->makeInscricoesExpedicao();
        $dbInscricoesExpedicao = $this->inscricoesExpedicaoRepo->find($inscricoesExpedicao->id);
        $dbInscricoesExpedicao = $dbInscricoesExpedicao->toArray();
        $this->assertModelData($inscricoesExpedicao->toArray(), $dbInscricoesExpedicao);
    }

    /**
     * @test update
     */
    public function testUpdateInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->makeInscricoesExpedicao();
        $fakeInscricoesExpedicao = $this->fakeInscricoesExpedicaoData();
        $updatedInscricoesExpedicao = $this->inscricoesExpedicaoRepo->update($fakeInscricoesExpedicao, $inscricoesExpedicao->id);
        $this->assertModelData($fakeInscricoesExpedicao, $updatedInscricoesExpedicao->toArray());
        $dbInscricoesExpedicao = $this->inscricoesExpedicaoRepo->find($inscricoesExpedicao->id);
        $this->assertModelData($fakeInscricoesExpedicao, $dbInscricoesExpedicao->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInscricoesExpedicao()
    {
        $inscricoesExpedicao = $this->makeInscricoesExpedicao();
        $resp = $this->inscricoesExpedicaoRepo->delete($inscricoesExpedicao->id);
        $this->assertTrue($resp);
        $this->assertNull(InscricoesExpedicao::find($inscricoesExpedicao->id), 'InscricoesExpedicao should not exist in DB');
    }
}
