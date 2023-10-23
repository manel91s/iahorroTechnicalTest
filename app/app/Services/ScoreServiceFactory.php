<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Interface\ScoreServiceInterface;
use App\Services\LeadScoringService;
use App\Services\NewCustomerScoringService;
use App\Services\RegularCostumerScoringService;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ScoreServiceFactory
{
    const LEAD = 1;
    const NEW_CUSTOMER = 2;
    const REGULAR_CUSTOMER = 3;

    public static function make(int $type): ?ScoreServiceInterface
    {
        switch ($type) {
            case self::LEAD:
                return new LeadScoringService();
            case self::NEW_CUSTOMER:
                return new NewCustomerScoringService();
            case self::REGULAR_CUSTOMER:
                return new RegularCostumerScoringService();
            default:
                throw new BadRequestException('Invalid type');
        }
    }
}
