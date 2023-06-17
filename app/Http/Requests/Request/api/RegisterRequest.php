<?php

namespace App\Http\Requests\Request\api;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Api\AuthenticationController;
use App\Models\User;

use App\Http\Controllers\Api\Auth;
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required'],
            'phone' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required'],
            'postal_code' => ['required'],
            'City' => ['required'],
        ];
    }
}
