@extends('website.layouts.default')
@section('content')
    {{-- {!! htmlScriptTagJsApi() !!} --}}
    <main class="w-full max-w-md mx-auto p-6" id="content">
        <a href="{{ url('/') }}" class="header-logo">
            <img src="{{ asset('img/col-h.png') }}" alt="logo" class="mx-auto block dark:hidden">
            <img src="{{ asset('img/col-hw.png') }}" alt="logo" class="mx-auto hidden dark:block">
        </a>
        <div class="mt-7 bg-white rounded-sm shadow-sm dark:bg-bgdark">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign in</h1>
                    {{-- <p class="mt-3 text-sm text-gray-600 dark:text-white/70">
                        Don't have an account yet?
                        <a class="text-primary decoration-2 hover:underline font-medium"
                            href="signup.html">
                            Sign up here
                        </a>
                    </p> --}}
                </div>

                <div class="mt-5">
                    {{-- <button type="button"
                        class="w-full py-2 px-3 inline-flex justify-center items-center gap-2 rounded-sm border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-0 focus:ring-offset-0 focus:ring-offset-white focus:ring-primary transition-all text-sm dark:bg-bgdark dark:hover:bg-black/20 dark:border-white/10 dark:text-white/70 dark:hover:text-white dark:focus:ring-offset-white/10">
                        <img src="../assets/img/authentication/social/1.png" class="w-4 h-4" alt="google-img">Sign in with Google
                    </button>

                    <div
                        class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white/70 dark:before:border-white/10 dark:after:border-white/10">
                        Or</div> --}}
                    <form method="POST" method="{{ route('login') }}">
                        @csrf
                        <!-- Form -->
                        <div>
                            <div class="grid gap-y-4">
                                <!-- Form Group -->
                                <div>
                                    <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                                    <div class="relative">
                                        <input type="email" id="email" name="email"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                            required>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div>
                                    <div class="flex justify-between items-center">
                                        <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                        <a class="text-sm text-primary decoration-2 hover:underline font-medium"
                                            href="forgot.html">Forgot password?</a>
                                    </div>
                                    <div class="relative">
                                        <input type="password" id="password" name="password"
                                            class="py-2 px-3 block w-full border-gray-200 rounded-sm text-sm focus:border-primary focus:ring-primary dark:bg-bgdark dark:border-white/10 dark:text-white/70"
                                            required>
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <button type="submit"
                                    class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-sm border border-transparent font-semibold bg-primary text-white hover:bg-primary focus:outline-none focus:ring-0 focus:ring-primary focus:ring-offset-0 transition-all text-sm dark:focus:ring-offset-white/10">Sign
                                    in</button>
                            </div>
                        </div>
                        <!-- End Form -->
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
