<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ValidatorRequest;
use App\Services\ClientService;
use App\Models\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ClientController extends Controller
{
    private ClientService $clientService;
    private ValidatorRequest $validatorRequest;

    public function __construct()
    {
        $this->clientService = new ClientService();

        $this->validatorRequest = new ValidatorRequest();
    }

    /**
     * Store a new client
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            
            $this->validatorRequest->validate($request);
            
            $client = $this->clientService->store($request);

            return response()->json($client, 201);
        } catch (BadRequestHttpException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getStatusCode());
        }
    }
}
