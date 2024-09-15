<div id="profile-settings-4" class="hidden" role="tabpanel" aria-labelledby="profile-settings-item-4">
    <div class="box border-0 shadow-none mb-0">
        <div class="box-header">
            <h5 class="box-title leading-none flex"><i class="ri ri-account-circle-line me-2"></i>
                Account Settings</h5>
        </div>
        <form action="{{ route('admin.user-account.update') }}" method="post">
            @csrf
            <div class="box-body">
                <h5 class="text-base font-semibold ">Social Accounts</h5>

                <div class="space-y-3 mt-5">

                    @foreach (config('dropdown.social_media') as $key => $value)
                        <div class="sm:grid grid-cols-12 gap-6 space-y-4">
                            <div class="col-span-2 my-auto">
                                <label class="ti-form-label">{{ $value }}</label>
                            </div>
                            <div class="col-span-10">
                                @php
                                    $media = $medias->firstWhere('media_id', $key);

                                @endphp
                                <input type="url" class="ti-form-input" value="{{ $media ? $media->url : '' }}"
                                    name="medias[{{ $key }}]" multiple>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class=" ">
                    <input type="submit" value="Update" class="ti-btn m-0 ti-btn-soft-primary">
                </div>
            </div>

        </form>
    </div>
</div>
