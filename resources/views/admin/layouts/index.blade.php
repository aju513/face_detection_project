@extends('admin.layouts.default')
@section('content')
    {{-- <main>
        <div class="max-w-screen-2xl mx-auto p-4 md:p-6 2xl:p-10">
            <div class="flex justify-between m-0 p-0">
                @include('admin.layouts.partials.breadcrumb')
                @include('admin.layouts.components.actions.create', ['action' => $ui->createAction()])
            </div>
            <hr class="text-white my-3">
            <div class="my-3">
                @includeFirst(["admin.$view.search", 'admin.layouts.components.search'])
            </div>
            <!-- ====== Table Section Start -->
            <div class="flex flex-col gap-10">
                @include('admin.layouts.components.table')
                @include('admin.layouts.components.pagination')
            </div>
            <!-- ====== Table Section End -->
        </div>
    </main> --}}






        <!-- Start::main-content -->
        <div class="main-content p-4 md:p-6 2xl:p-10">

            <div class="flex justify-between m-0 p-0">
                @include('admin.layouts.partials.breadcrumb')
                @include('admin.layouts.components.actions.create', ['action' => $ui->createAction()])
            </div>
            {{-- <hr class="text-white my-3"> --}}
            <div class="my-3">
                @includeFirst(["admin.$view.search", 'admin.layouts.components.search'])
            </div>
            <!-- Start::row-2 -->
            <div class="flex flex-col gap-10">
                @include('admin.layouts.components.table')
                @include('admin.layouts.components.pagination')
            </div>
            <!-- End::row-2-->
        </div>

@endsection
