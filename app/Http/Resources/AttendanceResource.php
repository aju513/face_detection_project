<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'created_at' => Carbon::parse($this->created_at)->format('F j, Y g:i A'),
            'subject' => $this->studentSubject->teacherSubject->subject->name,
            'status' => $this->status,
        ];
    }
}
