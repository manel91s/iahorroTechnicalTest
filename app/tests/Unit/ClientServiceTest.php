<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class ClientServiceTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    private ClientService $clientService;
    private InMemoryClientRepository $clientRepository;
   
    public function setup(): void
    {
        parent::setUp();

        $this->clientRepository = new InMemoryClientRepository();
        $this->clientService = new ClientService($this->clientRepository);

        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Check if get method returns a client
     */
    public function testSaveClient()
    {
        $request = new Request([
            'name' => 'manel',
            'email' => 'manel.aguilera91@gmail.com',
            'phone' => '12345667',
            'type_id' => 1
        ]);

        $result = $this->clientService->save($request);

        $this->assertInstanceOf(Client::class, $result);
        $this->assertNotNull($result);
    }

    /**
     * check if update method returns a client
     */
    public function testUpdateClient()
    {
        $this->testSaveClient();

        $request = new Request([
            'name' => 'manelUpdated',
            'email' => 'manelUpdated@test.com',
            'phone' => '12345667',
            'type_id' => 2
        ]);

        $result = $this->clientService->update($request, 1);

        $this->assertEquals('manelUpdated@test.com', $result->email);
    }

    /**
     * check if get method returns a client
     */
    public function testGetClient()
    {
        $this->testSaveClient();

        $result = $this->clientService->get(1);

        $this->assertInstanceOf(Client::class, $result);
        $this->assertNotNull($result);
    }

    /**
     * check if delete method returns a true
     */
    public function testDeleteClient()
    {
        $this->testSaveClient();

        $resultDelete = $this->clientService->delete(1);
        $resultGet = $this->clientRepository->get(1);

        $this->assertTrue($resultDelete);
        $this->assertNull($resultGet);
    }
}
