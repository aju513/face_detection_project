@inject('teacherHelper', 'App\Helpers\TeacherHelper')

<div class="grid grid-cols-2 gap-5">
    <!-- Teacher Subject Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Teacher Subject (*)')->for('teacher_subject_id')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('teacher_subject_id')->options($teacherHelper->teacherDropdown())->placeholder('Select a teacher subject...')->required()->class('ti-form-select py-2 px-3' . ($errors->has('teacher_subject_id') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'teacher_subject_id'])
    </div>

    <!-- Reschedule Date Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Reschedule Date (*)')->for('reschedule_date')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->date('reschedule_date')->placeholder('YYYY-MM-DD')->required()->class('ti-form-select' . ($errors->has('reschedule_date') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'reschedule_date'])
    </div>

    <!-- New Start Time Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('New Start Time')->for('new_start_time')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->time('new_start_time')->placeholder('HH:MM')->class('ti-form-select' . ($errors->has('new_start_time') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'new_start_time'])
    </div>

    <!-- New End Time Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('New End Time')->for('new_end_time')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->time('new_end_time')->placeholder('HH:MM')->class('ti-form-select' . ($errors->has('new_end_time') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'new_end_time'])
    </div>

    <!-- Reason Field -->
    <div class="mb-4.5 w-full col-span-2">
        {{ html()->label('Reason')->for('reason')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->textarea('reason')->placeholder('Reason for rescheduling')->rows(4)->class('ti-form-select' . ($errors->has('reason') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'reason'])
    </div>
</div>
