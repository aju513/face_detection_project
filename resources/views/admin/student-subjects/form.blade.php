@inject('student_helper', 'App\Helpers\StudentHelper')
<div class="grid grid-cols-2 gap-5">

    <!-- Student Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Student (*)')->for('student_id')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('student_id')->options($student_helper->dropdown())->placeholder('Select a student...')->required()->class('ti-form-select' . ($errors->has('student_id') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'student_id'])
    </div>

    <!-- Teacher Subject Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Teacher Subject (*)')->for('teacher_subject_id')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('teacher_subject_id')->options($student_helper->teacherSubjects())->placeholder('Select a teacher subject...')->required()->class('ti-form-select' . ($errors->has('teacher_subject_id') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'teacher_subject_id'])
    </div>

</div>
