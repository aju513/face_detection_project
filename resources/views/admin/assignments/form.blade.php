@inject('student_helper', 'App\Helpers\StudentHelper')

<div class="grid grid-cols-2 gap-5">

    <!-- Title Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Title (*)')->for('title')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->text('title')->placeholder('Title')->required()->class('ti-form-select' . ($errors->has('title') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'title'])
    </div>

    <!-- URL Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('File URL')->for('url')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->text('url')->placeholder('http://example.com/file.pdf')->class('ti-form-select' . ($errors->has('url') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'url'])
    </div>

    <!-- Deadline Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Deadline (*)')->for('deadline')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->datetime('deadline')->required()->class('ti-form-select' . ($errors->has('deadline') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'deadline'])
    </div>

    <!-- Teacher Subject Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Teacher Subject (*)')->for('teacher_subject_id')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('teacher_subject_id')->options($student_helper->teacherSubjects())->placeholder('Select a teacher subject...')->required()->class('ti-form-select' . ($errors->has('teacher_subject_id') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'teacher_subject_id'])
    </div>
</div>
