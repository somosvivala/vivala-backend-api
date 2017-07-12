<?php

use App\Models\InscricaoNewsletter;
use App\Repositories\InscricaoNewsletterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscricaoNewsletterRepositoryTest extends TestCase
{
    use MakeInscricaoNewsletterTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InscricaoNewsletterRepository
     */
    protected $inscricaoNewsletterRepo;

    public function setUp()
    {
        parent::setUp();
        $this->inscricaoNewsletterRepo = App::make(InscricaoNewsletterRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->fakeInscricaoNewsletterData();
        $createdInscricaoNewsletter = $this->inscricaoNewsletterRepo->create($inscricaoNewsletter);
        $createdInscricaoNewsletter = $createdInscricaoNewsletter->toArray();
        $this->assertArrayHasKey('id', $createdInscricaoNewsletter);
        $this->assertNotNull($createdInscricaoNewsletter['id'], 'Created InscricaoNewsletter must have id specified');
        $this->assertNotNull(InscricaoNewsletter::find($createdInscricaoNewsletter['id']), 'InscricaoNewsletter with given id must be in DB');
        $this->assertModelData($inscricaoNewsletter, $createdInscricaoNewsletter);
    }

    /**
     * @test read
     */
    public function testReadInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->makeInscricaoNewsletter();
        $dbInscricaoNewsletter = $this->inscricaoNewsletterRepo->find($inscricaoNewsletter->id);
        $dbInscricaoNewsletter = $dbInscricaoNewsletter->toArray();
        $this->assertModelData($inscricaoNewsletter->toArray(), $dbInscricaoNewsletter);
    }

    /**
     * @test update
     */
    public function testUpdateInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->makeInscricaoNewsletter();
        $fakeInscricaoNewsletter = $this->fakeInscricaoNewsletterData();
        $updatedInscricaoNewsletter = $this->inscricaoNewsletterRepo->update($fakeInscricaoNewsletter, $inscricaoNewsletter->id);
        $this->assertModelData($fakeInscricaoNewsletter, $updatedInscricaoNewsletter->toArray());
        $dbInscricaoNewsletter = $this->inscricaoNewsletterRepo->find($inscricaoNewsletter->id);
        $this->assertModelData($fakeInscricaoNewsletter, $dbInscricaoNewsletter->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInscricaoNewsletter()
    {
        $inscricaoNewsletter = $this->makeInscricaoNewsletter();
        $resp = $this->inscricaoNewsletterRepo->delete($inscricaoNewsletter->id);
        $this->assertTrue($resp);
        $this->assertNull(InscricaoNewsletter::find($inscricaoNewsletter->id), 'InscricaoNewsletter should not exist in DB');
    }
}
