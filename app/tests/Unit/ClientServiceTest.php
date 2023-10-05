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

    public function setup(): void
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Check if get method returns a client
     */
    public function testSaveClient()
    {
        $clientServiceMock = $this->getMockBuilder(ClientService::class)
            ->onlyMethods(['save'])
            ->getMock();

        $clientServiceMock->expects($this->once())
            ->method('save')
            ->willReturn(
                new Client(
                    [
                        'name' => 'manel',
                        'email' => 'manel@test.com',
                        'phone' => '12345667',
                        'type_id' => 1
                    ]
                )
            );

        $result = $clientServiceMock->save(new Request([
            'name' => 'manel',
            'email' => 'manel@test.com',
            'phone' => '12345667',
            'type_id' => 1
        ]));

        $this->assertInstanceOf(Client::class, $result);
    }

    /**
     * check if update method returns a client
     */
    public function testUpdateClient()
    {
        $clientServiceMock = $this->getMockBuilder(ClientService::class)
            ->onlyMethods(['update'])
            ->getMock();

        $clientServiceMock->expects($this->once())
            ->method('update')
            ->willReturn(
                new Client(
                    [
                        'id' => 1,
                        'name' => 'manel',
                        'email' => 'manelUpdated@test.com',
                        'phone' => '12345667',
                        'type_id' => 1
                    ]
                )
            );
        
        $id = 1;
        $result = $clientServiceMock->update(new Request([
            'id' => 1,
            'name' => 'manel',
            'email' => 'manelUpdated@test.com',
            'phone' => '12345667',
            'type_id' => 1
        ]), $id);

        $this->assertEquals('manelUpdated@test.com', $result->email);
    }
}
