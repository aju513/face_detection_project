@inject('teacher_helper', 'App\Helpers\TeacherHelper')
@inject('subject_helper', 'App\Helpers\SubjectHelper')
<div class="grid grid-cols-2 gap-5">

    <!-- Teacher ID Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Teacher (*)')->for('teacher_id')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('teacher_id')->options($teacher_helper->dropdown())->placeholder('Select a teacher...')->required()->class('ti-form-select py-2 px-3' . ($errors->has('teacher_id') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'teacher_id'])
    </div>

    <!-- Subject ID Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Subject (*)')->for('subject_id')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('subject_id')->options($subject_helper->dropdown())->placeholder('Select a subject...')->required()->class('ti-form-select py-2 px-3' . ($errors->has('subject_id') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'subject_id'])
    </div>

    <!-- Days of Week Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Days of Week (*)')->for('days_of_week')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('days_of_week[]')->options(config('dropdown.weeks'))->multiple()->placeholder('Select days...')->required()->class('ti-form-select py-2 px-3' . ($errors->has('days_of_week') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'days_of_week'])
    </div>

    <!-- Start Time Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Start Time (*)')->for('start_time')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->time('start_time')->placeholder('Start Time')->required()->class('ti-form-select' . ($errors->has('start_time') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'start_time'])
    </div>

    <!-- End Time Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('End Time (*)')->for('end_time')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->time('end_time')->placeholder('End Time')->required()->class('ti-form-select' . ($errors->has('end_time') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'end_time'])
    </div>

</div>
