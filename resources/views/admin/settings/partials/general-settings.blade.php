<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

    @include('admin.layouts.components.forms.input',[
    'label'=>__('form.name'),
    'type'=>'text',
    'name'=>'values[name]'
    ])

    @include('admin.layouts.components.forms.input',[
    'label'=>__('form.email'),
    'type'=>'text',
    'name'=>'values[email]'
    ])


    @include('admin.layouts.components.forms.input',[
    'label'=>__('form.address'),
    'type'=>'text',
    'name'=>'values[address]'
    ])

    @include('admin.layouts.components.forms.input',[
    'label'=>__('form.phone'),
    'type'=>'text',
    'name'=>'values[phone]'
    ])

    {{-- @include('admin.layouts.components.forms.file',[
    'label'=>'Logo',
    'type'=>'file',
    'name'=>'values[logo]'
    ]) --}}

</div>