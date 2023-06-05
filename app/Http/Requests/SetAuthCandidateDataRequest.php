<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SetAuthCandidateDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('GetAndSetAuthCandidateData', $this->user());

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

            'category_id' => ['numeric', 'exists:categories,id'],
            'about' => ['string', 'max:500'],
            'gender' => ['string', 'max:10', 'in:Male,Female'],
            'age' => ['numeric', 'max:140'],
            'experience' => ['string', 'max:20'],
            'qualification' => ['string', 'max:100'],
            'address' => ['string', 'max:200'],
        ];
    }
}