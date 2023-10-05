<?php

namespace Tests\Functional;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;
 
    const ENDPOINT_STORE = '/api/client/save';
    const ENDPOINT_UPDATE = '/api/client/update/1';
    const ENDPOINT_DELETE = '/api/client/delete/1';
    const ENDPOINT_GET = '/api/client/1';

    public function setUp(): void
    {
        parent::setUp();
        
        $this->seed(DatabaseSeeder::class);
    }
    
    /**
     * Check if field name is empty
     */
    public function testClientNoName()
    {
        $response = $this->postJson(self::ENDPOINT_STORE, ['name' => '']);

        $response->assertStatus(400);
    }

    /**
     * Check if field email is empty
     */
    public function testClientNoEmail()
    {
        $response = $this->postJson(self::ENDPOINT_STORE, ['email' => '']);

        $response->assertStatus(400);
    }

    /**
     * Check if field phone is empty
     */
    public function testClientNoPhone()
    {
        $response = $this->postJson(self::ENDPOINT_STORE, ['phone' => '']);

        $response->assertStatus(400);
    }

    public function testClientNotypeId()
    {
        $response = $this->postJson(self::ENDPOINT_STORE, ['type_id' => 0]);
        
        $response->assertStatus(400);
    }
    
    /**
     * save a client
     */
    public function testSaveClient()
    {
        $request = [
            'name' => 'Manel',
            'email' => 'Manel@test.com',
            'phone' => '123456789',
            'type_id' => 2
        ];

        $response = $this->postJson(self::ENDPOINT_STORE, $request);

        $response->assertStatus(201);
    }

    /**
     * Get a client
     */
     public function testGetClient()
     {
         $this->testSaveClient();
 
         $response = $this->getJson(self::ENDPOINT_GET);
 
         $response->assertStatus(200);
     }

    /**
     * Update a client
     */
    public function testUpdateClient()
    {
        $this->testSaveClient();

        $request = [
            'name' => 'ManelUpdated',
            'email' => 'ManelUpdated@test.com',
            'phone' => '123456789',
            'type_id' => 2
        ];

        $response = $this->putJson(self::ENDPOINT_UPDATE, $request);

        $response->assertStatus(200);
    }

    /**
     * Delete a client
     */
    public function testDeleteClient()
    {
        $this->testSaveClient();

        $response = $this->deleteJson(self::ENDPOINT_DELETE);

        $response->assertStatus(200);
    }
}

