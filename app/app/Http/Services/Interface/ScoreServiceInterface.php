<?php

namespace App\Http\Services\Interface;

use App\Models\Client;

interface ScoreServiceInterface
{
    public function getScore(Client $client): array;
}