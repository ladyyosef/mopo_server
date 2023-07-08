<?php

namespace App\Http\Controllers;

use App\Models\Send;
use Illuminate\Http\Request;
use App\Http\Controllers\Resources\SendResource;
use App\Http\Requests\Request\api\SendRequest;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $send = Send::with('Currency')->get();
        return SendResource::collection($send);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SendRequest $request)
    {
        $send = Send::create($request->validated());
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
