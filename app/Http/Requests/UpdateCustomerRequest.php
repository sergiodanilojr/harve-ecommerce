<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $wildcard = $this->route('customer');
        return [
            'name' => 'filled',
            'email' => 'filled|email|unique:customers,email,'.$wildcard,
            'password' => [
                'filled',
                Password::min(8)->numbers()->letters()->mixedCase()->symbols()       ],
        ];
    }
}
