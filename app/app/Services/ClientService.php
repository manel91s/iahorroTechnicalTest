<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Http\Client\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ClientService
{

    /**
     * store a new client
     * @param Request $request
     * @return Client|null
     */
    public function store(Request $request): ?Client
    {
        $register = new Client([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone')
        ]);

        $register->save();
        
        if (!$register->id) {
            throw new BadRequestHttpException('Error to save client', null, 400);
        }

        return Client::find($register->id);
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
