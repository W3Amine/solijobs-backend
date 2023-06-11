<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleJobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employer_id' => $this->employer_id,
            'category_id' => $this->category_id,
            'location_id' => $this->location_id,
            'title' => $this->title,
            'description' => $this->description,
            'salary' => $this->salary,
            'type' => $this->type,
            'is_active' => $this->is_active,
            'gender' => $this->gender,
            'experience' => $this->experience,
            'qualification' => $this->qualification,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'website' => $this->website,
            'profileImage' => Storage::disk('public')->url($this->profileImage),
        ];
    }
}