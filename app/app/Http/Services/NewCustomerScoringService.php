<?php

namespace App\Http\Services;

use App\Http\Services\Interface\ScoreServiceInterface;

use App\Models\Client;

class NewCustomerScoringService implements ScoreServiceInterface
{
    public function getScore(Client $client): array
    {
        return [
            'score' => 25,
            'reasons' => [],
        ];
    }
}