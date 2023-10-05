<?php

namespace App\Services;

use App\Http\Services\Interface\ScoreServiceInterface;

use App\Models\Client;

class RegularCostumerScoringService implements ScoreServiceInterface
{
    public function getScore(Client $client): array
    {
        return [
            'score' => 35,
            'reasons' => [],
        ];
    }
}