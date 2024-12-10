<div class="grid grid-cols-1 md:grid-cols-2 gap-5">
    <!-- Name Input -->
    <div>
        {{ html()->label('Name')->class('mb-2 font-semibold text-black dark:text-white') }}
        <span class="text-red-500">*</span>
        {{ html()->text('name')->placeholder('Enter Name')->required(true)->class('ti-form-input' . ($errors->has('name') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'name'])
    </div>

    <div>
        {{ html()->label('Phone no')->class('mb-2 font-semibold text-black dark:text-white') }}
        <span class="text-red-500">*</span>
        {{ html()->number('phone_no')->placeholder('Enter Phone Number')->required(true)->class('ti-form-input' . ($errors->has('phone_no') ? ' is-invalid' : '')) }}
        @include('admin.layouts.components.validation', ['name' => 'phone_no'])
    </div>
    <div>
        {{ html()->label('Email')->class('mb-2 font-semibold text-black dark:text-white') }}
        <span class="text-red-500">*</span>
        {{ html()->email('email')->placeholder('Enter Email')->required()->class('ti-form-input ' . ($errors->has('email') ? 'is-invalid ' : '') . ($model->email ? 'opacity-70 pointer-events-none' : '')) }}

        @include('admin.layouts.components.validation', ['name' => 'email'])
    </div>
    @if (Route::currentRouteName() == 'admin.students.create')
        <div>
            {{ html()->label('Password')->class('mb-2 font-semibold text-black dark:text-white') }}
            <span class="text-red-500">*</span>

            <div class="relative">
                {{ html()->password('password')->placeholder('Enter Password')->required()->class('ti-form-input' . ($errors->has('password') ? ' is-invalid' : ''))->id('password') }}

                <span class="absolute right-0 bottom-[20%] flex items-center pr-3 cursor-pointer"
                    onclick="togglePasswordVisibility('password')">
                    <svg id="eye-icon" class="w-5 h-5 text-gray-500 dark:text-gray-300" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.5C6.48 4.5 2 12 2 12s4.48 7.5 10 7.5 10-7.5 10-7.5-4.48-7.5-10-7.5zm0 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                        </path>
                    </svg>
                </span>
            </div>

            @include('admin.layouts.components.validation', ['name' => 'password'])
        </div>
        <script>
            function togglePasswordVisibility(id) {
                const passwordInput = document.getElementById(id);
                const eyeIcon = document.getElementById('eye-icon');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.5C6.48 4.5 2 12 2 12s4.48 7.5 10 7.5 10-7.5 10-7.5-4.48-7.5-10-7.5zm0 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                        </path>`;
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.5C6.48 4.5 2 12 2 12s4.48 7.5 10 7.5 10-7.5 10-7.5-4.48-7.5-10-7.5zm0 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                        </path>`;
                }
            }
        </script>
    @endif

    <div>
        {{ html()->label('Photo')->class('mb-2 font-semibold text-black dark:text-white') }}
        <span class="text-red-500">*</span>
        <input type="file" name="photo" id="small-file-input"
            class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 dark:text-white/70
                file:border-0
                file:bg-gray-100 file:me-4
                file:py-2 file:px-4
                dark:file:bg-bodybg dark:file:text-white/70 file-input {{ $errors->has('photo') ? ' is-invalid' : '' }}">
        @include('admin.layouts.components.validation', ['name' => 'logo'])
        <img src="{{ old('photo', $model->photo ? asset('storage/' . $model::IMG_PATH . '/' . $model->logo) : '') }}"
            alt="Banner Preview" class="mt-2 {{ $model->photo ? '' : 'hidden' }} max-w-40 h-auto preview" />
    </div>



</div>
<script>
    document.getElementById('banner-file-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('banner-preview');

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
