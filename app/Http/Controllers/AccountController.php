<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\User;
use App\Http\Controllers\Resources\AccountResource;
use App\Http\Controllers\AccountCollection;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @group Account
     */
    /**
     * @response 200 [
     *  "data": [
        {
            "User_id": {
                "user_name": "Ezequiel",
                "email": "loma97@example.net",
                "password": "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "phone": "518-597-0080",
                "Profile_image": "0"
            },
            "account_number": "796315242092"
        },
        {
            "User_id": {
                "user_name": "Armando",
                "email": "zroob@example.net",
                "password": "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "phone": "+1-806-283-1694",
                "Profile_image": "0"
            },
            "account_number": "711311369699"
        },
        {
            "User_id": {
                "user_name": "Kirk",
                "email": "kleuschke@example.net",
                "password": "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "phone": "+14423690885",
                "Profile_image": "0"
            },
            "account_number": "258500839564"
        },
        {
            "User_id": {
                "user_name": "Donnie",
                "email": "hickle.charley@example.com",
                "password": "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "phone": "1-469-434-3584",
                "Profile_image": "0"
            },
            "account_number": "887766668683"
        },
        *]

     * ]
     *@queryParam account int
     */
    public function index()
    {
        $account = Account::with('user')->get();
        return AccountResource::collection($account);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    /**
     * @response 200 [
     *    "data": {
        "User_id": {
            "user_name": "Donnie",
            "email": "hickle.charley@example.com",
            "password": "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "phone": "1-469-434-3584",
            "Profile_image": "0"
        },
        "account_number": "887766668683"
      *  }
     * ]
     * @queryParam account required int
     */
    public function show($id)
    {
        $account = Account::with('user')->find($id);
        return new AccountResource($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {

    }
}
