@inject('role_helper', 'App\Helpers\RoleHelper')

<div class="grid grid-cols-2 gap-5">

    <!-- Name Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Name (*)')->for('name')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->text('name')->placeholder('Name')->required()->class('ti-form-select' . ($errors->has('name') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'name'])
    </div>

    <!-- Email Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Email (*)')->for('email')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->email('email')->placeholder('email@example.com')->required()->class('ti-form-select' . ($errors->has('email') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'email'])
    </div>

    @if (!$model->exists)
        <!-- Password Field -->
        <div class="mb-4.5 w-full">
            {{ html()->label('Password (*)')->for('password')->class('mb-2.5 block text-black dark:text-white') }}
            {{ html()->password('password')->placeholder('Password')->required()->class('ti-form-select' . ($errors->has('password') ? ' is-invalid' : '')) }}
            @include('admin.layouts.components.validation', ['name' => 'password'])
        </div>
        <!-- Confirm Password Field -->
        <div class="mb-4.5 w-full">
            {{ html()->label('Confirm Password (*)')->for('password_confirmation')->class('mb-2.5 block text-black dark:text-white') }}
            {{ html()->password('password_confirmation')->placeholder('Confirm Password')->required()->class('ti-form-select' . ($errors->has('password_confirmation') ? ' is-invalid' : '')) }}
            @include('admin.layouts.components.validation', ['name' => 'password_confirmation'])
        </div>
    @endif

    <!-- Designation Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Designation')->for('designation')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->text('designation')->placeholder('Designation')->class('ti-form-select' . ($errors->has('designation') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'designation'])
    </div>

    <!-- Roles Field -->
    <div class="mb-4.5 w-full mb-2">
        {{ html()->label('Roles (*)')->for('roles[]')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->select('roles')->options($role_helper->dropdown())->placeholder('Select a roles...')->value($model->exists ? $model->roles()->first()->id : '')->class('ti-form-select py-2 px-3' . ($errors->has('roles') ? ' is-invalid' : '')) }}

        @include('admin.layouts.components.validation', ['name' => 'roles'])
    </div>

</div>
