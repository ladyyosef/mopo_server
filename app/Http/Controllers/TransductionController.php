<?php

namespace App\Http\Controllers;

use App\Models\transduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Resources\TransductionResource;
use App\Http\Requests\Request\api\TransductionRequest;

class TransductionController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {
        $transduction = transduction::with('userOut','userIn','trade')->get();
        return TransductionResource::collection($transduction);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransductionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $transduction = transduction::with('userOut','userIn','trade')->find($id);
        return new TransductionResource($transduction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transduction $transduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transduction $transduction)
    {
        //
    }
}
