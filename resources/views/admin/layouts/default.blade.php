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
    <script>
        document.getElementById('file-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };

                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
            }
        });
    </script>
    <script>
        window.addEventListener("load", () => {
            const themeBtn = document.querySelectorAll("[data-hs-theme-click-value]");
            let html = document.querySelector("html");
            themeBtn.forEach(($item) => {
                $item.addEventListener("click", () => {
                    if (html.classList.contains("dark")) {
                        html.classList.remove("dark");
                        localStorage.removeItem("layout-theme");
                        localStorage.removeItem("Syntodarktheme");
                        localStorage.removeItem("SyntoMenu");
                        localStorage.removeItem("SyntoHeader");
                        localStorage.removeItem("darkBgRGB");
                        localStorage.removeItem("bodyBgRGB");
                        html.setAttribute("data-menu-styles", "dark");
                        html.setAttribute("data-header-styles", "light");
                        html.style.removeProperty("--body-bg");
                        html.style.removeProperty("--dark-bg");
                        if (document.querySelector("#hs-overlay-switcher")) {
                            document.getElementById(
                                "switcher-light-theme"
                            ).checked = true;
                        }
                    } else {
                        if (document.querySelector("#hs-overlay-switcher")) {
                            document.getElementById(
                                "switcher-dark-theme"
                            ).checked = true;
                        }
                        html.setAttribute("class", "dark");
                        localStorage.setItem("layout-theme", "dark");
                        html.setAttribute("data-header-styles", "dark");
                        html.setAttribute("data-menu-styles", "dark");
                        localStorage.removeItem("SyntoMenu");
                        localStorage.removeItem("SyntoHeader");
                        localStorage.setItem("Syntodarktheme", true);
                        localStorage.removeItem("Syntolighttheme");
                        localStorage.setItem("SyntoMenu", "dark");
                        localStorage.setItem("SyntoHeader", "dark");
                    }
                });
            });
        });
    </script>

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
