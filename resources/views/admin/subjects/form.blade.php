<div class="grid grid-cols-2 gap-5">

    <!-- Name Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Name (*)')->for('name')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->text('name')->placeholder('Name')->required()->class('ti-form-select' . ($errors->has('name') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'name'])
    </div>

    <!-- Code Field -->
    <div class="mb-4.5 w-full">
        {{ html()->label('Code (*)')->for('code')->class('mb-2.5 block text-black dark:text-white') }}
        {{ html()->text('code')->placeholder('Code')->required()->class('ti-form-select' . ($errors->has('code') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'code'])
    </div>

</div>
