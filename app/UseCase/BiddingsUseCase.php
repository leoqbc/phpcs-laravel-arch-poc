<?php

namespace App\UseCase;

use App\Domain\Model\Bid;
use App\Domain\Model\Enum\Motorcycle as Enum;
use App\Repository\RepositoryInterface;

class BiddingsUseCase
{
    public function __construct(
        protected RepositoryInterface $repository
    ) {
        # code...
    }
    /**
     * UseCase Client can Bid Item
     */
    public function BidMotorcycle(int $userId, int $motorcycleId, float $userBidValue): object
    {
        // deveria ser trocado pelo useCase de Get User
        $this->repository->setCollection(\App\Models\User::class);
        $user = $this->repository->getById($userId);

        // deveria ser trocado pelo useCase de Get Motorcycle
        $this->repository->setCollection(\App\Models\Motorcycle::class);
        $motorcycle = $this->repository->getById($motorcycleId);

        $bid = new Bid($userBidValue, $motorcycle->price, Enum::from($motorcycle->status), 0);
        $bid->isValid();

        // Pode virar um DTO
        $userBid = (object)[
            'user_id' => $user->id,
            'motorcycle_id' => $motorcycle->id,
            'bid_value' => $userBidValue,
        ];

        $this->repository->setCollection(\App\Models\Bidding::class);
        $this->repository->save($userBid);

        return $userBid;
    }
}