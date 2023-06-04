<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SetAuthEmployerDataRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string' , 'max:120'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->email, 'email'),
            ],
            'phoneNumber' => ['email', 'unique:users,email'],
            'website' => ['email', 'unique:users,email'],
            'about' => ['email', 'unique:users,email'],
            'facebook' => ['email', 'unique:users,email'],
            'twitter' => ['email', 'unique:users,email'],
        ];
    }
}