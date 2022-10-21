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
        $repositoryMock = Mockery::mock(RepositoryInterface::class);
        $repositoryMock->shouldReceive('setCollection');
        $repositoryMock->shouldReceive('save');

        $user = new \stdClass();
        $user->id = 1;

        $motorcycle = new \stdClass();
        $motorcycle->id = 2;
        $motorcycle->price = 300_000;
        $motorcycle->status = 'open';

        $repositoryMock->shouldReceive('getById')->andReturn($user, $motorcycle);

        $useCase = new BiddingsUseCase($repositoryMock);
        
        $userBid = $useCase->BidMotorcycle(1, 2, 301_000);

        $this->assertSame(1, $userBid->user_id);
        $this->assertSame(2, $userBid->motorcycle_id);
        $this->assertSame(2, $userBid->motorcycle_id);
    }
}
