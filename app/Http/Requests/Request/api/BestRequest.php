<?php

namespace App\Http\Requests\Request\api;

use Illuminate\Foundation\Http\FormRequest;

class BestRequest extends FormRequest
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
            'currency_id' => ['required'],
            'User_id' => ['required'],
        ];
    }
}
