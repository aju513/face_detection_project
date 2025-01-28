<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssignmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'teacher_subject_id.required' => 'The teacher subject field is required.',
            'teacher_subject_id.exists' => 'The selected teacher subject is invalid.',
            'title.required' => 'The assignment title is required.',
            'title.max' => 'The title must not exceed 255 characters.',
            'url.url' => 'The URL format is invalid.',
            'deadline.required' => 'The deadline is required.',
            'deadline.after' => 'The deadline must be a future date.',
        ];
    }
}
