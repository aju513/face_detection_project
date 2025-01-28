<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'profile_picture' => url('storage/students/' . $this->profile_picture),
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
        ];
    }
}
