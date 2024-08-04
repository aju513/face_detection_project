@extends('admin.layouts.default')
@section('content')
<main class="overflow-y-scroll no-scrollbar mb-10">
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10 ">
        {!! htmlScriptTagJsApi() !!}
        @include('admin.layouts.partials.breadcrumb')
        <div class="row g-3">
            @include($form)
        </div>
    </div>
</main>

@endsection