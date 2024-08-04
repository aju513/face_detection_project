@can('Manage Users')
<a href="{{ route('admin.users.index') }}"
    class="rounded-lg border border-emerald-500 bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark hover:scale-110">
    <div class="flex items-end justify-between">
        <div>
            <h4 class="text-title-xl font-bold text-black dark:text-white mb-3">
                {{ App\Models\User::count() }}
            </h4>
            <span class="text-md font-medium">{{__('counter.total_users')}}</span>
        </div>
        <span class="flex h-20 w-20 items-center justify-center rounded-full bg-emerald-500 dark:bg-meta-4 text-white">
            <i class="bi bi-people"></i>
        </span>
    </div>
</a>
@endcan

@can('Manage Roles')
<a href="{{ route('admin.roles.index') }}"
    class="rounded-lg border border-blue-500 bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark hover:scale-105">
    <div class="flex items-end justify-between">
        <div>
            <h4 class="text-title-xl font-bold text-black dark:text-white mb-3">
                {{ App\Models\Role::count() }}
            </h4>
            <span class="text-md font-medium">{{__('counter.total_roles')}}</span>
        </div>
        <span class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-500 text-white dark:bg-meta-4">
            <i class="bi bi-check2-all"></i>
        </span>
    </div>
</a>
@endcan