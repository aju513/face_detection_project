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

    @include('admin.layouts.partials.scripts')

    <!-- Back To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill text-xl"></i></span>
    </div>
    <div id="responsive-overlay"></div>
</body>

</html>
