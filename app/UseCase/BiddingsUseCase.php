<?php

namespace App\UseCase;

use App\Models\Motorcycle;
use App\Models\User;

class BiddingsUseCase
{
    /**
     * UseCase Client can Bid Item
     */
    public function BidMotorcycle(int $userId, int $motorcycleId, float $bidValue)
    {
        $user = User::find($userId);
        $motorcycle = Motorcycle::find($motorcycleId);

        // adicionar o bid
    }
}