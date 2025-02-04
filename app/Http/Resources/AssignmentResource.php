<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'deadline' => Carbon::parse($this->deadline)->format('F j, Y g:i A'),
            'subject_name' => $this->teacherSubject->subject->name ?? null,
        ];
    }
}
