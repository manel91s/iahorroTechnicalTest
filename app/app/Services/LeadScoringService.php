<?php

namespace App\Services;


use App\Models\Client;
use App\Services\Interface\ScoreServiceInterface;

class LeadScoringService implements ScoreServiceInterface
{
    public function getScore(Client $client): array
    {
        return [
            'score' => 10,
            'reasons' => [],
        ];
    }
}