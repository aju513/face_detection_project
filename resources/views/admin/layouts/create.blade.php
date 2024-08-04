@extends('admin.layouts.default')
@section('content')
    <div class="main-content overflow-y-scroll no-scrollbar mb-10 p-4 md:p-6 2xl:p-10">
        {{-- {!! htmlScriptTagJsApi() !!} --}}
        @include('admin.layouts.partials.breadcrumb')
        <!-- Start::row-3 -->
        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12">
                <div class="box">
                    <div class="box-body">
                        {{ html()->modelForm($model, $ui->getMethod($model, $params), $ui->getRoute($model, $params))->id('form-validator')->acceptsFiles()->open() }}
                        <div class="row g-3">
                            @include($form)
                        </div>
                        <button type="submit" name="submit" value="SUBMIT" class="ti-btn ti-btn-primary">Submit</button>
                        <a type="button" class="ti-btn ti-btn-danger" href="{{ url()->previous() }}">Cancel</a>
                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>

        </div>
        <!-- End::row-3 -->
    </div>
@endsection
