<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class NotificationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'teacher_subject_id' => $this->teacher_subject_id,
            'title' => $this->title,
            'details' => $this->details,
            'created_at' => Carbon::parse($this->created_at)->format('F j, Y g:i A'),
            'updated_at' => $this->updated_at,
        ];
    }
}
