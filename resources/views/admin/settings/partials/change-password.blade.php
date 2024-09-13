<div id="profile-settings-3" class="hidden" role="tabpanel" aria-labelledby="profile-settings-item-3">
    <div class="box border-0 shadow-none mb-0">
        <div class="box-header">
            <h5 class="box-title leading-none flex"><i class="ri ri-lock-line me-2"></i> Password Settings</h5>
        </div>
        <div class="box-body p-0">

            <div
                class="col-span-12 xl:col-span-6 xl:border-e xl:border-b-0 border-b p-6 border-gray-200 dark:border-white/10">
                <div class="space-y-4">
                    <form action="{{ route('admin.change-password.store', auth()->user()->id) }}" method="post">
                        @csrf
                        <div class="space-y-4 mb-2">
                            <label class="ti-form-label mb-2">Current Password<sup class="text-danger">*</sup></label>
                            <input type="password" class="my-auto ti-form-input mb-2" autocomplete="off"
                                placeholder="Current Password" name="current_password" required>
                        </div>
                        <div class="space-y-4 mb-2">
                            <label class="ti-form-label mb-2">New Password<sup class="text-danger">*</sup></label>
                            <input type="password" class="my-auto ti-form-input " autocomplete="off"
                                placeholder="New Password" required name="password">
                        </div>
                        <div class="space-y-4">
                            <label class="ti-form-label mb-2">Confirm Password<sup class="text-danger">*</sup></label>
                            <input type="password" class="my-auto ti-form-input mb-2" autocomplete="off"
                                placeholder="Confirm Password" required name="password_confirmation">
                        </div>
                        <p class="text-xs text-gray-500 dark:text-white/70">Password should be min of <b
                                class="text-success">10 characters <sup>*</sup> </b> (and up to 100 characters),<b
                                class="text-success">One Upper Case Character<sup>*</sup></b> and <b
                                class="text-success">One Special Character<sup>*</sup></b> e.g., ! @ # ? included.</p>
                        <div class="box-footer text-end space-x-3 rtl:space-x-reverse">
                            <input type="submit" value="Update" class="ti-btn m-0 ti-btn-soft-primary">
                            <a href="javascript:void(0);" class="ti-btn m-0 ti-btn-soft-secondary"><i
                                    class="ri ri-close-circle-line"></i> Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
