<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Repository\ClientRepository;
use App\Services\ClientService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

/** php artisan test tests/Unit/ClientServiceExampleMockTest.php*/

class ClientServiceExampleMockTest extends TestCase
{
  const LEAD = 1;
  const NEW_CUSTOMER = 2;
  const REGULAR_CUSTOMER = 3;

  private ClientService $clientService;
  private ClientRepository $clientRepository;

  protected function setUp(): void
  {
    parent::setUp();

    $this->clientRepository = $this->createMock(ClientRepository::class);
    $this->clientService = new ClientService($this->clientRepository);
  }

  /**
   * Check if get method returns a client
   */
  public function testGetClient()
  {
    $client = new Client();
    $client->id = 1;
    $client->name = 'manel';
    $client->email = 'manel.aguilera91@gmail.com';
    $client->phone = '1234567';
    $client->type_id = self::LEAD;

    $this->clientRepository->expects($this->once())
      ->method('get')
      ->with(1)
      ->willReturn($client);

    $result = $this->clientService->get(1);

    $this->assertInstanceOf(Client::class, $result);
    $this->assertEquals($client->id, $result->id);
  }

  /**
   * Check if save method returns a client
   */
  public function testSaveClient()
  {
    $client = new Client();
    $client->name = 'manel';
    $client->email = 'manel.aguilera91@gmail.com';
    $client->phone = '1234567';
    $client->type_id = self::LEAD;
    $client->score = 10;

    $this->clientRepository->expects($this->once())
      ->method('save')
      ->with($client)
      ->willReturn(new Client([
        'id' => 1,
        'name' => 'manel',
        'email' => 'manel.aguilera91@gmail.com',
        'phone' => '1234567',
        'type_id' => 1,
        'score' => 10
      ]));

    $result = $this->clientService->save(new Request([
      'name' => 'manel',
      'email' => 'manel.aguilera91@gmail.com',
      'phone' => '1234567',
      'type_id' => self::LEAD
    ]));

    $this->assertInstanceOf(Client::class, $result);
    $this->assertEquals($client->email, $result->email);
  }

  /**
   * check if update method returns a client
   */
  public function testUpdateClient()
  {
    $client = new Client();
    $client->id = 1;
    $client->name = 'manel';
    $client->email = 'manel.aguilera91@gmail.com';
    $client->phone = '1234567';
    $client->type_id = 1;
    $client->score = 10;

    $this->clientRepository->expects($this->once())
      ->method('get')
      ->with(1)
      ->willReturn($client);

    $client->name = 'manelUpdated';
    $client->email = 'manelUpdated@gmail.com';
    $client->phone = '1234567';
    $client->type_id = self::NEW_CUSTOMER;
    $client->score = 25;

    $this->clientRepository->expects($this->once())
      ->method('update')
      ->with($client)
      ->willReturn($client);

    $result = $this->clientService->update(new Request([
      'name' => 'manelUpdated',
      'email' => 'manelUpdated@gmail.com',
      'phone' => '1234567',
      'type_id' => self::NEW_CUSTOMER
    ]), 1);

    $this->assertInstanceOf(Client::class, $result);
    $this->assertEquals($client->email, $result->email);
  }

  /**
   * check if delete method returns a true
   */
  public function testDeleteClient()
  {
    $client = new Client();
    $client->id = 1;
    $client->name = 'manel';
    $client->email = 'manel.aguilera91@gmail.com';
    $client->phone = '1234567';
    $client->type_id = self::LEAD;
    $client->score = 10;

    $this->clientRepository->expects($this->once())
      ->method('get')
      ->with(1)
      ->willReturn($client);

    $this->clientRepository->expects($this->once())
      ->method('delete')
      ->with(1)
      ->willReturn(true);

    $result = $this->clientService->delete(1);

    $this->assertTrue($result);
  }
}
