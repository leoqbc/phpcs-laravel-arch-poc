<?php

namespace App\UseCase;

use App\Domain\Model\Bid;
use App\Domain\Model\Enum\Motorcycle as Enum;
use App\Repository\RepositoryInterface;

class BiddingsUseCase
{
    /**
     * UseCase Client can Bid Item
     */
    public function BidMotorcycle(int $userId, int $motorcycleId, float $userBidValue)
    {
        // deveria ser trocado pelo useCase de Get User
        $user = \App\Models\User::find($userId);

        // deveria ser trocado pelo useCase de Get Motorcycle
        $motorcycle = \App\Models\Motorcycle::find($motorcycleId);

        $bid = new Bid($userBidValue, $motorcycle->price, Enum::from($motorcycle->status), 0);
        $bid->isValid();

        // Pode virar um DTO
        $userBid = [
            'user_id' => $user->id,
            'motorcycle_id' => $motorcycle->id,
            'bid_value' => $userBidValue,
        ];

        $biding = new \App\Models\Bidding();
        $biding->save($userBid);

        return $userBid;
    }
}