<?php

namespace App\Services;

use App\Models\Client;
use App\Models\ClientType;
use Illuminate\Http\Client\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ClientService
{

    /**
     * get a client
     * @param int $id
     * @return Client|null
     */
    public function get(int $id): ?Client
    {
        $client = Client::find($id);

        if (!$client) {
            throw new BadRequestHttpException('Client not found', null, 400);
        }

        return $client;
    }

    /**
     * store a new client
     * @param Request $request
     * @return Client|null
     */
    public function save(Request $request): ?Client
    {
        $register = new Client([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
        
        $register->type_id = $request->get('type_id');
        
        $register->save();

        if (!$register->id) {
            throw new BadRequestHttpException('Error to save client', null, 400);
        }

        $client = Client::find($register->id);

        $client->score = $this->getScore($client);
        $client->save();

        return $client;
    }

    /**
     * update a client
     * @param Request $request
     * @return Client|null
     */
    public function update(Request $request, int $id): ?Client
    {
        $client = Client::find($id);

        if (!$client) {
            throw new BadRequestHttpException('Client not found', null, 400);
        }

        $client->name = $request->get('name');
        $client->email = $request->get('email');
        $client->phone = $request->get('phone');
        $client->type_id = $request->get('type_id');
        $client->score = $this->getScore($client);
        $client->save();

        return $client;
    }

    /**
     * delete a client
     * @param Request $request
     * @return bool
     */
    public function delete(int $id): bool
    {
        $client = Client::find($id);

        if (!$client) {
            throw new BadRequestHttpException('Client not found', null, 400);
        }

        return $client->delete();
    }

    /**
     * get score from a client calling a service factory
     * @param Client $client
     * @return int
     */
    private function getScore(Client $client): int
    {
        $scoreService = ScoreServiceFactory::make(
            $client->type_id
        );

        return $scoreService->getScore($client)['score'];
    }
}
