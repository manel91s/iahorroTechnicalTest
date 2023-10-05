<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Services\ClientService;
use Symfony\Component\HttpFoundation\Request;
use Tests\TestCase;

class ClientServiceTest extends TestCase
{
    public function setup(): void
    {
        parent::setUp();
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

    /**
     * check if get method returns a client
     */
    public function testGetClient()
    {
        $clientServiceMock = $this->getMockBuilder(ClientService::class)
            ->onlyMethods(['get'])
            ->getMock();

        $clientServiceMock->expects($this->once())
            ->method('get')
            ->willReturn(
                new Client(
                    [
                        'id' => 1,
                        'name' => 'manel',
                        'email' => 'manel@test.com',
                        'phone' => '12345667',
                        'type_id' => 1
                    ]
                )
            );

        $result = $clientServiceMock->get(1);
   
        $this->assertInstanceOf(Client::class, $result);
    }

    /**
     * check if delete method returns a true
     */
    public function testDeleteClient()
    {
        $clientServiceMock = $this->getMockBuilder(ClientService::class)
            ->onlyMethods(['delete'])
            ->getMock();

        $clientServiceMock->expects($this->once())
            ->method('delete')
            ->willReturn(true);

        $result = $clientServiceMock->delete(1);
   
        $this->assertTrue($result);
    }
}
