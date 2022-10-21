<?php

namespace App\Domain\Model;

use App\Domain\Model\Enum\Motorcycle;

class Bid
{
    public function __construct(
        protected readonly float $userPrice,
        protected readonly float $motorcyclePrice,
        protected readonly Motorcycle $motorcycleStatus,
        protected readonly float $lastBidPrice = 0,
    ) {
        # code...
    }

    public function setPrice(float $price)
    {
        $this->userPrice = $price;
    }

    public function isInvalidInitialBid(): bool
    {
        if ($this->lastBidPrice > 0) {
            return false;
        }
        return $this->userPrice <= $this->motorcyclePrice;
    }

    public function isInvalidLastBid(): bool
    {
        if ($this->userPrice <= $this->lastBidPrice) {
            return true;
        }
        return false;
    }

    public function isClosedMotorcycleStatus()
    {
        return $this->motorcycleStatus === Motorcycle::CLOSED;
    }

    public function isValid(): bool
    {
        if ($this->isClosedMotorcycleStatus()) {
            throw new \Exception('Cannot bid to a closed status');
        }

        if ($this->isInvalidInitialBid()) {
            throw new \Exception('Price need to be greater than the motorcycle');
        }

        if ($this->isInvalidLastBid()) {
            throw new \Exception('User bid Price need to be greater than the last bid price');
        }
        return true;
    }
}
