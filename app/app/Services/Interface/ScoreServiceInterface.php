<?php

namespace App\Services;

use App\Models\Client;

interface ScoreServiceInterface
{
    public function getScore(Client $client): array;
}