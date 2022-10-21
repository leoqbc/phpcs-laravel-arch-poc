<?php

namespace Tests\Unit;

use App\UseCase\BiddingsUseCase;
use PHPUnit\Framework\TestCase;

class BiddingsUseCaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBidUseCaseCanBeCreated()
    {
        $useCase = new BiddingsUseCase();
        $useCase->BidMotorcycle(1, 2, 300_000);
    }
}
