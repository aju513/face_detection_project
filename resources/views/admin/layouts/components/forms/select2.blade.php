<div class="mb-4.5 w-full">
    {{ html()->label($label)->class('font-semibold text-black dark:text-white') }}
    {{isset($required)?html()->span('*')->class('text-danger'):''}}
    {{ html()->multiselect($name.'[]', $options, isset($value)? $value :null)
    ->placeholder($placeholder??$label)
    ->required(isset($required)?true:false)
    ->id(isset($id)?$id:$name)
    ->class(isset($class)? $class:
    'w-full rounded bg-transparent font-medium outline-none mt-2.5
    transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter
    dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary' .
    ($errors->has($name) ? ' border-red-500' : ' border-stroke'), )
    }}
    @include('admin.layouts.components.validation', ['name' => $name])
</div>

<style>
    .ts-control, .ts-wrapper.single.input-active .ts-control{
        padding: 16px !important;
    }
</style>