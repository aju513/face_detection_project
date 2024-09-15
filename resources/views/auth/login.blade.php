@extends('website.layouts.default-without-header')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <link rel="icon" href="{{ asset('img/icon.png') }}" type="image/x-icon" />
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0px 1000px transparent inset;
            transition: background-color 5000s ease-in-out 0s;
        }

        .shadow {
            box-shadow: 0 0 35px rgba(99, 98, 98, 0.19),
                0 0 35px rgba(105, 99, 99, 0.23);
            transition: all 0.3s ease-in-out;
        }

        .input-container {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid rgb(32, 32, 32);
            border-radius: 0.5rem;
            transition: border-color 0.3s ease;
            position: relative;
        }

        .input-container.focused {
            border-color: #032ce5;
        }

        .input-container input {
            width: 100%;
            padding: 0.5rem;
            border: none;
            background: transparent;
            outline: none;
        }

        .input-container input:focus {
            outline: none;
        }

        .bg-opacity {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
        }

        .input-container input::placeholder {
            color: black;
        }

        .text-danger {
            color: red
        }
    </style>
    <div class="flex min-h-screen items-center justify-center bg-gradient-to-r p-4"
        style="background-image: url('{{ asset('img/bg-register.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
        <div class="absolute inset-0 bg-black opacity-50 z-0"></div>
        <div
            class="bg-opacity relative z-10 flex flex-col md:flex-row rounded-lg shadow overflow-hidden max-w-4xl w-full py-12">
            <div class="md:w-1/2 hidden md:flex p-4 border-r-2 border-gray-300 justify-center items-center">
                <div class="flex flex-col gap-4 items-center justify-center">
                    <img src="{{ asset('img/icon.png') }}" alt="Side Image"
                        class="w-48 h-auto object-cover items-center justify-center" />
                    <h1 class="text-4xl font-semibold">COL Architecture</h1>
                </div>
            </div>

            <div class="w-full md:w-1/2 p-6 md:p-10 items-center gap-2">
                <div class="flex flex-col items-center gap-2">
                    <h2 class="text-2xl font-semibold">Login to Dashboard</h2>
                    <div class="mb-6">
                        <p class="text-sm text-xl">Learn COL Global</p>
                    </div>
                </div>
                <form class="flex flex-col gap-10 justify-center" method="POST" method="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col gap-2">
                            <div class="relative flex items-center gap-1 justify-center">
                                <div class="input-container" id="emailContainer">
                                    <input type="email" id="emailInput" placeholder="Email Address" name="email" />
                                </div>
                            </div>
                            <div class="relative flex items-center">
                                <div class="input-container justify-center" id="passwordContainer">
                                    <input type="password" id="passwordInput" placeholder="*********" name="password" />
                                    <button type="button" onclick="togglePasswordVisibility()"
                                        class="absolute inset-y-0 right-3 flex items-center text-gray-500"
                                        id="togglePasswordButton" aria-label="Toggle password visibility">
                                        <i id="passwordIcon" class="fas fa-eye-slash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @include('admin.layouts.components.validation', ['name' => 'email'])

                        <div class="text-right">
                            <a href="{{ route('website.reset.password') }}" class="text-sm hover:underline text-blue-500">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full px-4 py-4 bg-blue-500 text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-600 font-bold">
                        Login
                    </button>
                </form>

            </div>
        </div>
    </div>
    <script>
        const emailContainer = document.getElementById("emailContainer");
        const emailInput = document.getElementById("emailInput");
        const passwordContainer = document.getElementById("passwordContainer");
        const passwordInput = document.getElementById("passwordInput");

        emailInput.addEventListener("focus", () => {
            emailContainer.classList.add("focused");
        });

        emailInput.addEventListener("blur", () => {
            emailContainer.classList.remove("focused");
        });

        passwordInput.addEventListener("focus", () => {
            passwordContainer.classList.add("focused");
        });

        passwordInput.addEventListener("blur", () => {
            passwordContainer.classList.remove("focused");
        });
    </script>
    <script>
        let showPassword = false;

        function togglePasswordVisibility() {
            showPassword = !showPassword;
            const passwordInput = document.getElementById("passwordInput");
            const passwordIcon = document.getElementById("passwordIcon");
            if (showPassword) {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
@endsection
{{-- </body>

    </html> --}}
