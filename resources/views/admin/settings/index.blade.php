@extends('admin.layouts.default')
@section('content')
   
    <div class="main-content">
        <div class="block justify-between page-header md:flex">
            <div>
                <h3 class="text-gray-700 hover:text-gray-900 dark:text-white dark:hover:text-white text-2xl font-medium">
                    Profile
                    Settings</h3>
            </div>
            <ol class="flex items-center whitespace-nowrap min-w-0">
                <li class="text-sm">
                    <a class="flex items-center font-semibold text-primary hover:text-primary dark:text-primary truncate"
                        href="javascript:void(0);">
                        Pages
                        <i
                            class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-gray-300 dark:text-gray-300 rtl:rotate-180"></i>
                    </a>
                </li>
                <li class="text-sm text-gray-500 hover:text-primary dark:text-white/70 " aria-current="page">
                    Profile Settings
                </li>
            </ol>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-x-6">
        <div class="col-span-12 xl:col-span-3">
            <div class="box">
                <div class="box-body pt-0 mt-4">
                    <nav class="flex flex-col space-y-2" aria-label="Tabs" role="tablist" data-hs-tabs-vertical="true">
                        <button type="button"
                            class="hs-tab-active:bg-primary hs-tab-active:border-primary hs-tab-active:text-white dark:hs-tab-active:bg-primary dark:hs-tab-active:border-primary dark:hs-tab-active:text-white -me-px py-3 px-3 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-sm hover:text-gray-700 dark:bg-bodybg dark:border-white/10 dark:text-white/70 active"
                            id="profile-settings-item-1" data-hs-tab="#profile-settings-1"
                            aria-controls="profile-settings-1" role="tab">
                            <i class="ri ri-shield-user-line"></i> Personal Settings
                        </button>
                        <button type="button"
                            class="hs-tab-active:bg-primary hs-tab-active:border-primary hs-tab-active:text-white dark:hs-tab-active:bg-primary dark:hs-tab-active:border-primary dark:hs-tab-active:text-white -me-px py-3 px-3 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-sm hover:text-gray-700 dark:bg-bodybg dark:border-white/10 dark:text-white/70 dark:hover:text-gray-300"
                            id="profile-settings-item-3" data-hs-tab="#profile-settings-3"
                            aria-controls="profile-settings-3" role="tab">
                            <i class="ri ri-lock-line"></i> Password Settings
                        </button>
                        <button type="button"
                            class="hs-tab-active:bg-primary hs-tab-active:border-primary hs-tab-active:text-white dark:hs-tab-active:bg-primary dark:hs-tab-active:border-primary dark:hs-tab-active:text-white -me-px py-3 px-3 inline-flex items-center gap-2 bg-gray-50 text-sm font-medium text-center border text-gray-500 rounded-sm hover:text-gray-700 dark:bg-bodybg dark:border-white/10 dark:text-white/70 dark:hover:text-gray-300"
                            id="profile-settings-item-4" data-hs-tab="#profile-settings-4"
                            aria-controls="profile-settings-4" role="tab">
                            <i class="ri ri-account-circle-line"></i> Account Settings
                        </button>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-span-12 xl:col-span-9">
            <div class="box">
                <div class="box-body p-0">
                    @include('admin.settings.partials.personal-settings')
                    @include('admin.settings.partials.change-password')
                    @include('admin.settings.partials.account-settings')
                </div>

            </div>
        </div>
    </div>
@endsection
