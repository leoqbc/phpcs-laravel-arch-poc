<?php

namespace Tests\Unit;

use App\Repository\RepositoryInterface;
use App\UseCase\BiddingsUseCase;
use Mockery;
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
        
        $userBid = (object)$useCase->BidMotorcycle(1, 2, 301_000);

        $this->assertSame(1, $userBid->user_id);
        $this->assertSame(2, $userBid->motorcycle_id);
        $this->assertSame(301_000.00, $userBid->bid_value);
    }
}
