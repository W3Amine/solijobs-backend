<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class jobRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'description' => 'required|string',
            'salary' => 'required|numeric|min:0',
            'type' => 'required|string',
            'gender' => 'required|in:Male,Female,Both',
            'experience' => 'required|integer|min:0',
            'qualification' => 'required|string',
            'address' => 'required|string',
        ];
    }
}