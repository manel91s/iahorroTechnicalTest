<?php

declare(strict_types=1);

namespace App\Services\Interface;

use App\Models\Client;

interface ScoreServiceInterface
{
    public function getScore(Client $client): array;
}
