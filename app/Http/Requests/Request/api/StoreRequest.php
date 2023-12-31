<?php

namespace App\Http\Requests\Request\api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'type' => ['required', 'in:visa,master'],
            'Card_number' => ['required'],
            'Holder_Name' => ['required'],
            'Cvc' => ['required'],
            'password' => ['required'],
            'Expire_Date' => ['required'],
        ];
    }
}
