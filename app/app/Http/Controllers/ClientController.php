<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ClientController extends Controller
{
    public function __construct()
    {
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json([
            'data' => 'hola'
        ], 200);
    }
}
