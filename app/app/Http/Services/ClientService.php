<?php

namespace App\Http\Services;

use App\Models\Client;
use Symfony\Component\HttpFoundation\Request;

class ClientService
{
    public function __construct()
    {
    }

    /**
     * store a new client
     * @param Request $request
     * @return Client|null
     */
    public function store(Request $request): ?Client
    {
        return null;
    }

    /**
     * update a client
     * @param Request $request
     * @return Client|null
     */
    public function update(Request $request): ?Client
    {
        return null;
    }

    /**
     * delete a client
     * @param Request $request
     * @return string|null
     */
    public function delete(Request $request): ?string
    {
        return null;
    }
}
