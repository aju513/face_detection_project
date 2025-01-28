<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentClassesResource extends JsonResource
{
    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Transform the resource into a variable
        $data = parent::toArray($request);

        return [
            'teacher_subject' => [
                'id' => $data['teacher_subject']['id'] ?? null,
                'teacher_id' => $data['teacher_subject']['teacher_id'] ?? null,
                'subject_id' => $data['teacher_subject']['subject_id'] ?? null,
                'days_of_week' => isset($data['teacher_subject']['days_of_week'])
                    ? json_decode($data['teacher_subject']['days_of_week'], true)
                    : null,
                'start_time' => $data['teacher_subject']['start_time'] ?? null,
                'end_time' => $data['teacher_subject']['end_time'] ?? null,
                'created_at' => $data['teacher_subject']['created_at'] ?? null,
                'updated_at' => $data['teacher_subject']['updated_at'] ?? null,
                'subject' => [
                    'id' => $data['teacher_subject']['subject']['id'] ?? null,
                    'name' => $data['teacher_subject']['subject']['name'] ?? null,
                    'code' => $data['teacher_subject']['subject']['code'] ?? null,
                    'created_at' => $data['teacher_subject']['subject']['created_at'] ?? null,
                    'updated_at' => $data['teacher_subject']['subject']['updated_at'] ?? null,
                ],
            ],
        ];
    }
}
