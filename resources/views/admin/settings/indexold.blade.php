@extends('admin.layouts.default')
@section('content')
<main class="overflow-y-scroll no-scrollbar mb-10">
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 ">
        {!! htmlScriptTagJsApi() !!}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <nav>
                <ol class="flex gap-2 text-title-sm">
                    <li><a href="{{route('admin.dashboard')}}">{{__('menu.Dashboard')}} /</a></li>
                    <li class="text-primary">
                        <a href="">{{__('menu.'.$title)}}</a>
                    </li>
                </ol>
            </nav>
        </div>
        <hr class="my-3 text-stroke">
        <div class="mb-14 w-full p-7.5">
            <div class="flex flex-wrap gap-3 border-b border-stroke pb-5 dark:border-strokedark">
                @foreach ($settings as $setting)
                @can($setting->permission)
                <a href="{{ route('admin.settings.edit', ['name' => $setting->name]) }}"
                    class="rounded-md py-3 px-4 text-sm font-medium hover:bg-secondary hover:text-white dark:hover:bg-secondary md:text-base lg:px-6
                                @if ($setting->name == $model->name) bg-primary text-white @else bg-gray dark:bg-meta-4 text-black dark:text-white @endif">
                    {{ __('admin.' . $setting->display_name) }}
                </a>
                @endcan
                @endforeach
            </div>
            <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="p-6.5">
                    {{ html()->modelForm($model,'PUT')->route('admin.settings.update',['name' =>
                    $model->name])->acceptsFiles()->open() }}
                    @include("admin.settings.partials." . $model->name)
                    <button type="submit"
                        class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ __('admin.submit') }}
                    </button>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection