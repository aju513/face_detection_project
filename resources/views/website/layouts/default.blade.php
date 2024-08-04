<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" class="light" data-header-styles="light"
    data-menu-styles="dark">

@include('website.layouts.partials.head')

<body class="">
    <!-- Loader -->
    @include('website.layouts.partials.loader')
    <!-- Loader -->

    <div class="page">

        <!-- Start::Header -->
        @include('website.layouts.partials.header')
        <!-- End::Header -->

        <div class="">

            <!-- Start::main-content -->
            @yield('content')
            <!-- Start::main-content -->

        </div>


        @include('website.layouts.partials.footer')


    </div>


    <!-- Apex Charts JS -->
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Chartjs Chart JS -->
    <script src="{{ asset('libs/chart.js/chart.min.js') }}"></script>

    <!-- Back To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>

    <div id="responsive-overlay"></div>

    <!-- popperjs -->
    <script src="{{ asset('libs/@popperjs/core/umd/popper.min.js') }}"></script>
    <!-- Color Picker JS -->
    <script src="{{ asset('libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>
    <!-- Preline JS -->
    <script src="{{ asset('libs/preline/preline.js') }}"></script>
    <!-- Simplebar JS -->
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>

</body>

</html>
