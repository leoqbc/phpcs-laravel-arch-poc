<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use \App\Domain\Model\Bid;
use App\Domain\Model\Enum\Motorcycle;

/**
 * Algumas Regras de negócio do projeto
 * 
 * 1. Um lance não pode ser menor que o valor da moto
 * 2. Um lance não pode ser menor que o ultimo
 * 3. Um lance não pode acontecer quando o leilão da moto estiver encerrado
 */
class BiddingTest extends TestCase
{
    public function testBidShouldNotBeLessThenBikePrice()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Price need to be greater than the motorcycle');

        $bid = new Bid(
            userPrice: 200_000,
            motorcyclePrice: 300_000,
            motorcycleStatus: Motorcycle::OPEN,
            lastBidPrice: 0
        );

        $bid->isValid();
    }

    public function testBidShouldBeGreaterThenBikePrice()
    {
        $bid = new Bid(
            userPrice: 301_000,
            motorcyclePrice: 300_000,
            motorcycleStatus: Motorcycle::OPEN,
            lastBidPrice: 0
        );

        $this->assertTrue($bid->isValid());
    }

    public function testBidPriceShouldBeGreaterThenLastBid()
    {
        $bid = new Bid(
            userPrice: 303_000,
            motorcyclePrice: 300_000,
            motorcycleStatus: Motorcycle::OPEN,
            lastBidPrice: 302_000,
        );

        $this->assertTrue($bid->isValid());
    }

}
