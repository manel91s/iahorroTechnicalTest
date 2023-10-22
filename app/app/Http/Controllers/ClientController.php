<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ValidatorRequest;
use App\Repository\ClientRepository;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ClientController extends Controller
{
    private ClientService $clientService;
    private ValidatorRequest $validatorRequest;

    public function __construct()
    {
        $this->clientService = new ClientService(
            new ClientRepository()
        );
        $this->validatorRequest = new ValidatorRequest();
    }

    /**
     * Get a client
     * @param int $id
     * @return JsonResponse
     */
    public function get(int $id): JsonResponse
    {
        try {
            $client = $this->clientService->get($id);

            return response()->json([
                'msg' => 'Client found',
                'data' => $client
            ], 200);
        } catch (BadRequestHttpException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getStatusCode());
        }
    }

    /**
     * Store a new client
     * @param Request $request
     * @return JsonResponse
     */
    public function save(Request $request): JsonResponse
    {
        try {

            $this->validatorRequest->validate($request);

            $client = $this->clientService->save($request);

            return response()->json([
                'msg' => 'Client created succesfully',
                'data' => $client
            ], 201);
        } catch (BadRequestHttpException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getStatusCode());
        }
    }

    /**
     * Update a client
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        try {

            $this->validatorRequest->validate($request);

            $client = $this->clientService->update($request, $id);

            return response()->json([
                'msg' => 'Client updated succesfully',
                'data' => $client
            ], 200);
        } catch (BadRequestHttpException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getStatusCode());
        }
    }

    /**
     * Delete a client
     * @param Request $requestp
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $this->clientService->delete($id);

            return response()->json([
                'msg' => 'Client deleted succesfully'
            ], 200);
        } catch (BadRequestHttpException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getStatusCode());
        }
    }
}
