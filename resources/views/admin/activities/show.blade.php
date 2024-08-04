@extends('admin.layouts.default')
@section('content')
<main>
    <div class="max-w-screen-2xl mx-auto p-4 md:p-6 2xl:p-10">
        <div class="flex justify-between mb-3">
            @include('admin.layouts.partials.breadcrumb')
        </div>
        {{-- <hr class="my-3"> --}}

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4 bg-gray-200 border-b border-gray-300 text-center">
                <h3 class="text-lg font-semibold text-gray-800">{{ $model->event }}</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-3">
                    <div class="py-3">
                        <span class="font-semibold">Event:</span> {{ $model->event }}
                    </div>
                    <div class="py-3">
                        <span class="font-semibold">Description:</span> {{ $model->description }}
                    </div>
                    <div class="py-3">
                        <span class="font-semibold">Created:</span> {{ $model->created_at->diffForHumans()
                        }}
                    </div>
                    @foreach($model->properties as $key => $property)
                        <div class="py-3">
                            <span class="font-semibold">{{ ucwords($key) }}:</span> {{ $property }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</main>
@endsection