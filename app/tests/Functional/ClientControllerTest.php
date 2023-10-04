<?php

namespace Tests\Functional;

use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    public function testStore()
    {
        $response = $this->get('/api/client');

        $this->assertEquals(200, $response->getStatusCode());
    }
}