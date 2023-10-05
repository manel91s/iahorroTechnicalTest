<?php

namespace App\Services;

use App\Http\Services\Interface\ScoreServiceInterface;
use App\Http\Services\LeadScoringService;
use App\Http\Services\NewCustomerScoringService;
use App\Http\Services\RegularCostumerScoringService;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ScoreServiceFactory 
{

    CONST LEAD = 1;
    CONST NEW_CUSTOMER = 2;
    CONST REGULAR_CUSTOMER = 3;
    
    public static function make(string $type): ScoreServiceInterface
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