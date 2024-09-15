<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light"
    data-menu-styles="dark">

@include('admin.layouts.partials.head')



<body class="">

    <!-- Loader -->
    @include('admin.layouts.partials.loader')
    <!-- Loader -->

    <div class="page">

        <!-- Start::Header -->
        @include('admin.layouts.partials.header')
        <!-- End::Header -->

        <!-- Start::app-sidebar -->
        @include('admin.layouts.partials.sidebar')
        <!-- End::app-sidebar -->

        <div class="content">

            <!-- Start::main-content -->
            @yield('content')
            <!-- Start::main-content -->

        </div>

        @include('admin.layouts.partials.footer')

    </div>



    <!-- Back To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @include('admin.layouts.partials.scripts')
</body>

</html>
