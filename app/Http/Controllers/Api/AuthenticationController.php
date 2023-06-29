<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Request\api\loginRequest;
use App\Http\Requests\Request\api\RegisterRequest;
use App\Models\User;
use App\Models\Usertype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller

{
/**
*login
*@response{
*    token:"7|QJ2jbJiUqXfVH1PpqnYjFj0YXLiSneUMvrWfxWPF"
*}
*@response 422 scenario= "validation errors"{
    "message": "The email field is required. (and 1 more error)",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ]
    }
*}
*@response 401 scenario = "Email or Password Wrong"{
     "Message": "Email or Password Wrong"
*}
*@response 400 scenario = "user send a valid token"
    "message": "You are already logged in"

**/

    public function login(loginrequest $request)
    {
      if (!Auth::attempt(['email' => $request->email, 'password' => $request->password,'User_Type_id' =>2]))

      {
         return response(['Message' => 'Email or Password Wrong',], 401);
      }

      $token = auth()->user()->createToken("token")->plainTextToken;
      return response([
        "token" => $token,
      ]);

    }

/**
*loginAdmin
*@response{
*    token:"8|8MxQJgQICxUG4L7UUbS91dovFpjGhZj8dDJA17c8"
*}
*@response 422 scenario= "validation errors"{
    "message": "The email field is required. (and 1 more error)",
    "errors": {
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ]
    }
*}
*@response 401 scenario = "Email or Password Wrong"{
     "Message": "Email or Password Wrong"
*}
*@response 400 scenario = "user send a valid token"
    "message": "You are already logged in"

**/


    public function loginAdmin(loginrequest $request)
    {
     if(!Auth::attempt(['email' => $request->email, 'password' => $request->password,'User_Type_id' =>1]))

      {
         return response(['Message' => 'Email or Password Wrong',], 401);
      }

      $token = auth()->user()->createToken("token")->plainTextToken;
      return response([
        "token" => $token,
      ]);
    }
/**
 * register
 * @response {
 * token :"2|hH5oOB6k9zUOweZ63H0uYtN2zL6VD5Fj9lGjUs6Z"
 * }
 * @response 422 scenario= "validation errors"{
 *"message": "The user name field is required. (and 5 more errors)",
    "errors": {
        "Full_name": [
            "The full name field is required."
        ],
        "phone": [
            "The phone field is required."
        ],
        "email": [
            "The email field is required."
        ],
        "password": [
            "The password field is required."
        ],
        "postal_code": [
            "The postal code field is required."
        ],
        "City": [
            "The city field is required."
        ],
        "Nationality": [
            "The nationality field is required."
          ],
        "Birth_date": [
            "The birth date field is required."
        ]
    }
 * }
 * *@response 401 scenario = "Email or Password Wrong"{
     "Message": "Email or Password Wrong"
 *}
 *@response 400 scenario = "user send a valid token"
    "message": "You are already logged in"
 */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
        'Full_name' => $request->Full_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'postal_code' => $request->postal_code,
        'City' => $request->City,
        'Nationality' =>$request->Nationality,
        'Birth_date' => $request->Birth_date,
        'password' => Hash::make ($request->password),
        'User_Type_id' => 2
       ]);
       (!Auth::attempt(['email' => $request->email, 'password' => $request->password, 'Full_name' => $request->Full_name,
         'phone' => $request->phone , 'Birth_date' =>$request->Birth_date, 'Nationality' =>$request ->Nationality,
         'postal_code' => $request->postal_code, 'City' => $request->City
       ]));
       $token = auth()->user()->createToken("token")->plainTextToken;
         return response([
         "token" => $token,
       ]);
    }
 /**
 * logout
 ** @response 204
 * @response 401 scenario ="user not logged in"{
    "message": "Unauthenticated."
* }
 */
    public function logout()
    {
      auth()->user()->currentAccessToken()->delete();
      return response()->noContent();
    }
}
