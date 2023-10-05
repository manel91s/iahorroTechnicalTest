<?php

namespace App\Services;

use App\Services\ScoreServiceFactory;
use Tests\TestCase;

class ScoreServiceFactoryTest extends TestCase
{
    public function setup(): void
    {
        parent::setUp();
    }

    /**
     * Check if make method returns a LeadScoringService
     */
    public function testMakeLeadScoringService()
    {
        $result = ScoreServiceFactory::make(ScoreServiceFactory::LEAD);

        $this->assertInstanceOf(LeadScoringService::class, $result);
    }

    /**
     * Check if make method returns a NewCustomerScoringService
     */
    public function testMakeNewCustomerScoringService()
    {
        $result = ScoreServiceFactory::make(ScoreServiceFactory::NEW_CUSTOMER);

        $this->assertInstanceOf(NewCustomerScoringService::class, $result);
    }

    /**
     * Check if make method returns a RegularCostumerScoringService
     */
    public function testMakeRegularCostumerScoringService()
    {
        $result = ScoreServiceFactory::make(ScoreServiceFactory::REGULAR_CUSTOMER);

        $this->assertInstanceOf(RegularCostumerScoringService::class, $result);
    }

    /**
     * Check if make method throws an exception
     */
    public function testMakeException()
    {
        $this->expectException(\Symfony\Component\HttpFoundation\Exception\BadRequestException::class);

        ScoreServiceFactory::make('invalid');
    }
}