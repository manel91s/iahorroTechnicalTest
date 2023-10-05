<?php

namespace App\Services;

use App\Services\Interface\ScoreServiceInterface;

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