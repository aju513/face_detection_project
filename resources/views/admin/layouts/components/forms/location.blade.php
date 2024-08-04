@inject('location_helper', 'App\Helpers\LocationHelper')
<div class="mb-4.5 w-full">
    {{ html()->label(__('form.Province'))->class('font-semibold text-black dark:text-white') }}
    {{isset($required)?html()->span('*')->class('text-danger'):''}}
    {{ html()->select('province_id', $location_helper->provinces(), null)
    ->placeholder(__('form.Select'))
    ->required(isset($required)?true:false)
    ->id('province_id')    
    ->class(isset($class)? $class:
    'w-full rounded border-[1.5px] bg-transparent py-3 px-5 font-medium outline-none mt-2.5
    transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter
    dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary' .
    ($errors->has('province_id') ? ' border-red-500' : ' border-stroke'), )
    }}
    @include('admin.layouts.components.validation', ['name' => 'province_id'])
</div>

<div class="mb-4.5 w-full">
    {{ html()->label(__('form.District'))->class('font-semibold text-black dark:text-white') }}
    {{isset($required)?html()->span('*')->class('text-danger'):''}}
    {{ html()->select('district_id',[], null)    
    ->placeholder(__('form.Select'))
    ->required(isset($required)?true:false)
    ->id('district_id')      
    ->class(isset($class)? $class:
    'w-full rounded border-[1.5px] bg-transparent py-3 px-5 font-medium outline-none mt-2.5
    transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter
    dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary' .
    ($errors->has('district_id') ? ' border-red-500' : ' border-stroke'), )
    }}
    @include('admin.layouts.components.validation', ['name' => 'district_id'])
</div>

<div class="mb-4.5 w-full">
    {{ html()->label(__('form.Municipality'))->class('font-semibold text-black dark:text-white') }}
    {{isset($required)?html()->span('*')->class('text-danger'):''}}
    {{ html()->select('muni_id', [], null)
    ->placeholder(__('form.Select'))
    ->required(isset($required)?true:false)
    ->id('muni_id')
    ->class(isset($class)? $class:
    'w-full rounded border-[1.5px] bg-transparent py-3 px-5 font-medium outline-none mt-2.5
    transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter
    dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary' .
    ($errors->has('muni_id') ? ' border-red-500' : ' border-stroke'), )
    }}
    @include('admin.layouts.components.validation', ['name' => 'muni_id'])
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {
    $("#province_id").on("change", function (e) {
        const val = $(this).val();
        const container = $("#district_id");
        let selected = container.data("selected");
        if(selected){
            selected = selected.toString();
        }
        container.empty();
        container.append(`<option value=''>{{__('form.Select')}}</option>`);
        if (val !== "") {
            let select = "";
            $.get("/api/location/districts/" + val).then((res) => {
                $.each(res, function (value, label) {
                    if (selected === value) {
                        select = "selected";
                    }else{
                        select = '';
                    }
                    container.append(
                        `<option value=${value} ${select}>${label}</option>`
                    );
                });
                container.trigger("change");
            });
        }
    });
    $("#district_id").on("change", function (e) {
        const val = $(this).val();
        const container = $("#muni_id");
         let selected = container.data("selected");
         if (selected) {
             selected = selected.toString();
         }
        container.empty();
        container.append(`<option value=''>{{__('form.Select')}}</option>`);
        if (val !== "") {
            let select = "";
            $.get("/api/location/municipalities/" + val).then((res) => {
                $.each(res, function (value, label) {
                    if (selected === value) {
                        select = "selected";
                    }else {
                        select = "";
                    }
                    container.append(
                        `<option value=${value} ${select}>${label}</option>`
                    );
                });
            });
        }
});

    $("#province_id").trigger("change");
});

</script>