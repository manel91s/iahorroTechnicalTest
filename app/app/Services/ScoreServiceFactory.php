<?php

namespace App\Services;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ScoreServiceFactory 
{
    public static function make(string $type): ScoreServiceInterface
    {
        switch ($type) {
            case 'lead':
                return new LeadScoringService();
            case 'new_customer':
                return new NewCustomerScoringService();
            case 'regular_customer':
                return new RegularCostumerScoringService();
            default:
                throw new BadRequestException('Invalid type');
        }
    }
}