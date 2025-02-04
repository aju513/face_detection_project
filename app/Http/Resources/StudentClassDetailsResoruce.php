<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentClassDetailsResoruce extends JsonResource
{
    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'days_of_week' => $this->mapDaysOfWeek(json_decode($this->days_of_week)),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'subject' => $this->subject,
            'teacher' => $this->teacher,
            'assignments' => AssignmentResource::collection($this->assignments)
        ];

    }
    public function mapDaysOfWeek(array $days_of_week)
    {
        $weeks = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];

        return array_values(array_filter(array_map(fn($day) => $weeks[$day] ?? null, $days_of_week)));
    }

}


