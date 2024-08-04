<header class="header custom-sticky !top-0 !w-full">
    <nav class="main-header" aria-label="Global">
        <div class="header-content">
            {{-- <div class="header-left">
                <!-- Navigation Toggle -->
                <div class="">
                    <button type="button" class="sidebar-toggle !w-100 !h-100">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="ri-arrow-right-circle-line header-icon"></i>
                    </button>
                </div>
                <!-- End Navigation Toggle -->
            </div> --}}

            <div class="responsive-logo">
                <a class="responsive-logo-dark" href="" aria-label="Brand"><img
                        src="/img/brand-logos/desktop-logo.png" alt="logo" class="mx-auto"></a>
                <a class="responsive-logo-light" href="" aria-label="Brand"><img
                        src="/img/brand-logos/desktop-dark.png" alt="logo" class="mx-auto"></a>
            </div>

            <div class="header-right">
                <div class="responsive-headernav flex">
                    <div class="header-nav-right">
                        <div class="header-theme-mode hidden sm:block">
                            <a aria-label="anchor"
                                class="hs-dark-mode-active:hidden flex hs-dark-mode group flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-gray-100 hover:bg-gray-200 text-gray-500 align-middle focus:outline-none focus:ring-0 focus:ring-gray-400 focus:ring-offset-0 focus:ring-offset-white transition-all text-xs dark:bg-bgdark dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                                href="javascript:;" data-hs-theme-click-value="dark">
                                <i class="ri-moon-line header-icon"></i>
                            </a>
                            <a aria-label="anchor"
                                class="hs-dark-mode-active:flex hidden hs-dark-mode group flex-shrink-0 justify-center items-center gap-2 h-[2.375rem] w-[2.375rem] rounded-full font-medium bg-gray-100 hover:bg-gray-200 text-gray-500 align-middle focus:outline-none focus:ring-0 focus:ring-gray-400 focus:ring-offset-0 focus:ring-offset-white transition-all text-xs dark:bg-bgdark dark:hover:bg-black/20 dark:text-white/70 dark:hover:text-white dark:focus:ring-white/10 dark:focus:ring-offset-white/10"
                                href="javascript:;" data-hs-theme-click-value="light">
                                <i class="ri-sun-line header-icon"></i>
                            </a>
                        </div>

                    </div>
                    <div class="">
                        <a href="{{route('login')}}" class="ti-btn bg-blue-500 text-white hover:bg-blue-600 focus:ring-blue-500 dark:focus:ring-offset-white/10">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
