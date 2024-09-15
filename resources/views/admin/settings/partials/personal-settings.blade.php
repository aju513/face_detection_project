<div id="profile-settings-1" role="tabpanel" aria-labelledby="profile-settings-item-1">
    <div class="box border-0 shadow-none mb-0">
        <div class="box-header">
            <h5 class="box-title leading-none flex"><i class="ri ri-shield-user-line me-2"></i> Personal
                Settings</h5>
        </div>
        <form action="{{ route('admin.user-profile.update', Auth::user()->id) }}" method="post">
            @csrf
            <div class="box-body">
                <div>
                    <div class="grid lg:grid-cols-2 gap-6">

                        <div class="space-y-2">
                            <label class="ti-form-label mb-0">Name</label>
                            <input type="text" class="my-auto ti-form-input" placeholder="Firstname" name="name"
                                value="{{ Auth::user()->name }}">
                            @include('admin.layouts.components.validation', ['name' => 'name'])
                        </div>

                        <div class="space-y-2 ">
                            <label class="ti-form-label mb-0">Phone Number</label>
                            <input type="number" class="my-auto ti-form-input" placeholder="+977 123-456-789"
                                name="phone" value="{{ Auth::user()->phone }}">
                            @include('admin.layouts.components.validation', ['name' => 'phone'])
                        </div>

                        <div class=" ">
                            <input type="submit" value="Update" class="ti-btn m-0 ti-btn-soft-primary">
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
</div>
