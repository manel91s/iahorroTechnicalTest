<?php

namespace Tests\Functional;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;
    
    const ENDPOINT_STORE = '/api/client';
    
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
    
    /**
     * save a client
     */
    public function testSaveClient()
    {
        $request = [
            'name' => 'test',
            'email' => 'test@test.com',
            'phone' => '123456789',
        ];

        $response = $this->postJson(self::ENDPOINT_STORE, $request);

        $response->assertStatus(201);
    }
}