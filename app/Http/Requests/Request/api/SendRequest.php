<?php

namespace App\Http\Requests\Request\api;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
            'account_number'=>['required'],
            'currency_id'=>['required'],
            'email'=>['required'],
            'quantity'=>['required'],
        ];
    }
}
