<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Repository\Eloquent\EloquentRepository;
use App\UseCase\BiddingsUseCase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BiddingsController extends Controller
{
    public function __construct(
        protected BiddingsUseCase $useCase,
    ) {
        # code...
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bidding::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = (object)$request->all();

        try {
            $userBid = $this->useCase->BidMotorcycle(
                $requestData->user_id, 
                $requestData->motorcycle_id, 
                $requestData->bid_value
            );
            return $userBid;
        } catch (\Exception $ex) {
            return [
                'error' => $ex->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bidding::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Response $response)
    {
        // não permitir mudar um lance
        return $response->setStatusCode(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bidding::destroy($id);
    }
}
