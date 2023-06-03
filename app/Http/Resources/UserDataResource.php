<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phoneNumber' => $this->phoneNumber,
            'role' => $this->role,
            'profileImage' => Storage::disk('public')->url($this->profileImage),
            'email_verified_at' => $this->email_verified_at,
        ];

    }
}