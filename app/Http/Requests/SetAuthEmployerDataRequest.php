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
        return $this->user()->can('getAuthEmployerData', $this->user());
        ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->email, 'email'),
            ],
            'phoneNumber' => [
                'regex:/^(\+\d{1,3}\s?)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
                Rule::unique('users')->ignore(auth()->user()->phoneNumber, 'phoneNumber'),
            ],
            'website' => ['url'],
            'about' => ['string', 'max:500'],
            'facebook' => ['url'],
            'twitter' => ['url'],
        ];
    }
}