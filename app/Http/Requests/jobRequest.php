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
            // 'location_id' => 'required|exists:locations,id',
            'description' => 'required|string',
            'salary' => 'nullable|numeric|min:0',
            'type' => 'required|string',
            'gender' => 'required|in:Male,Female,Both',
            'experience' => 'nullable|string|max:40',
            'qualification' => 'nullable|string|max:100',
            'address' => 'required|string|max:200',
            'country' => 'required|string|max:40',
            'city' => 'required|string|max:40',
        ];
    }
}