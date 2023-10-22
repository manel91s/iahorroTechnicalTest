<?php

namespace App\Services;

use App\Models\Client;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Repository\RepositoryInterface;

class ClientService
{
    private RepositoryInterface $clientRepository;

    public function __construct(RepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * get a client
     * @param int $id
     * @return Client|null
     */
    public function get(int $id): ?Client
    {
        $client = $this->clientRepository->get($id);

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

        $register = $this->clientRepository->save($register);

        if (!$register->id) {
            throw new BadRequestHttpException('Error to save client', null, 400);
        }

        $register->score = $this->getScore($register);
        $register->save();

        return $register;
    }

    /**
     * update a client
     * @param Request $request
     * @return Client|null
     */
    public function update(Request $request, int $id): ?Client
    {
        $client = $this->clientRepository->get($id);

        if (!$client) {
            throw new BadRequestHttpException('Client not found', null, 400);
        }

        $client->name = $request->get('name');
        $client->email = $request->get('email');
        $client->phone = $request->get('phone');
        $client->type_id = $request->get('type_id');
        $client->score = $this->getScore($client);

        $client = $this->clientRepository->update($client);

        return $client;
    }

    /**
     * delete a client
     * @param Request $request
     * @return bool
     */
    public function delete(int $id): bool
    {
        $client = $this->clientRepository->get($id);

        if (!$client) {
            throw new BadRequestHttpException('Client not found', null, 400);
        }

        return $this->clientRepository->delete($client->id);
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
