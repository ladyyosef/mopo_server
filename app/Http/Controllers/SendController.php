<?php

namespace App\Http\Controllers;

use App\Models\Send;
use Illuminate\Http\Request;
use App\Http\Controllers\Resources\SendResource;
use App\Http\Requests\Request\api\SendRequest;
use App\Models\User;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $send = Send::with(['currency', 'user']);
        if ($request->to) {
            $send = $send->where('to_id', auth()->id());
        }

        $send = $send->get();
        return SendResource::collection($send);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SendRequest $request)
    {
        $user = auth()->user();
        if (!$wallet = $user->wallets()->where('currency_id', $request->currency_id)->first()) {
            return response([
                'message' => 'You don\'t have any of this currency in your wallet',
            ], 400);
        }
        if ($wallet->Quantity < $request->amount) {
            return response([
                'message' => 'You don\'t have enough amount in your wallet',
            ], 400);
        }
        $to = User::where('email', $request->email)->first();
        $send = Send::create(array_merge($request->validated(), ['user_id' => $user->id, 'to_id' => $to->id]));
        $wallet->update(['Quantity' => $wallet->Quantity - $request->amount]);
        return new SendResource($send);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $send = Send::with('Currency')->find($id);
        return new SendResource($send);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Send $send)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Send $send)
    {
        $send->delete();
        return response(null, 204);
    }
}
