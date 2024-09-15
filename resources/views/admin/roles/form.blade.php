@inject('permission_helper', 'App\Helpers\PermissionHelper')
@php $selected = $permission_helper->selected($model->permissions) @endphp

{{ html()->label('Role Name')->class('mb-2 font-semibold text-black dark:text-white') }}
{{ html()->text('name')->placeholder('Role name')->required(true)->class('ti-form-input border-slate-200 rounded-lg') }}

<div class="form-group mt-2">
    {{ html()->label('Permissions')->class('mb-2.5 font-semibold text-black dark:text-white') }}
    {{ html()->span('*')->class('text-danger') }}
    <div class="col-10 mb-5">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1">
            @foreach ($permission_helper->dropdown() as $package => $permission)
                <label class="relative inline-flex items-center cursor-pointer my-3">
                    <input type="checkbox" value="{{ $permission->id }}" class="sr-only peer" name="permissions[]"
                        {{ in_array($permission->id, $selected) ? 'checked' : '' }}>
                    <div
                        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                        {{ $permission->name }}
                    </span>
                </label>
            @endforeach
        </div>
    </div>
    @error('permissions')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
