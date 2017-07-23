<?php

use App\Models\InscricaoExperiencia;
use App\Repositories\InscricaoExperienciaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscricaoExperienciaRepositoryTest extends TestCase
{
    use MakeInscricaoExperienciaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InscricaoExperienciaRepository
     */
    protected $inscricaoExperienciaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inscricaoExperienciaRepo = App::make(InscricaoExperienciaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->fakeInscricaoExperienciaData();
        $createdInscricaoExperiencia = $this->inscricaoExperienciaRepo->create($inscricaoExperiencia);
        $createdInscricaoExperiencia = $createdInscricaoExperiencia->toArray();
        $this->assertArrayHasKey('id', $createdInscricaoExperiencia);
        $this->assertNotNull($createdInscricaoExperiencia['id'], 'Created InscricaoExperiencia must have id specified');
        $this->assertNotNull(InscricaoExperiencia::find($createdInscricaoExperiencia['id']), 'InscricaoExperiencia with given id must be in DB');
        $this->assertModelData($inscricaoExperiencia, $createdInscricaoExperiencia);
    }

    /**
     * @test read
     */
    public function testReadInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->makeInscricaoExperiencia();
        $dbInscricaoExperiencia = $this->inscricaoExperienciaRepo->find($inscricaoExperiencia->id);
        $dbInscricaoExperiencia = $dbInscricaoExperiencia->toArray();
        $this->assertModelData($inscricaoExperiencia->toArray(), $dbInscricaoExperiencia);
    }

    /**
     * @test update
     */
    public function testUpdateInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->makeInscricaoExperiencia();
        $fakeInscricaoExperiencia = $this->fakeInscricaoExperienciaData();
        $updatedInscricaoExperiencia = $this->inscricaoExperienciaRepo->update($fakeInscricaoExperiencia, $inscricaoExperiencia->id);
        $this->assertModelData($fakeInscricaoExperiencia, $updatedInscricaoExperiencia->toArray());
        $dbInscricaoExperiencia = $this->inscricaoExperienciaRepo->find($inscricaoExperiencia->id);
        $this->assertModelData($fakeInscricaoExperiencia, $dbInscricaoExperiencia->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInscricaoExperiencia()
    {
        $inscricaoExperiencia = $this->makeInscricaoExperiencia();
        $resp = $this->inscricaoExperienciaRepo->delete($inscricaoExperiencia->id);
        $this->assertTrue($resp);
        $this->assertNull(InscricaoExperiencia::find($inscricaoExperiencia->id), 'InscricaoExperiencia should not exist in DB');
    }
}
