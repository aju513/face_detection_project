{{-- {{ Form::open(['url' => url()->current(), 'method' => 'GET', 'class' => 'form-group row']) }}
@inject('activity_helper', 'Core\Helpers\ActivityHelper')

<div class="grid grid-cols-2">
    <div class="">
        {{ Form::select('event', $activity_helper->getEventsDropdown(), $params['event'] ?? null, [
            'class' =>
                'w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary select2',
        ]) }}
    </div>
    <div class="text-end">
        {{ Form::submit(__($package . '::table.Search'), ['class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}
        <a href="{{ route(Request::route()->getName()) }}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ __($package . '::table.Refresh') }}</a>
    </div>
</div>

{{ Form::close() }} --}}
