<div class="mb-4.5 w-full">
    {{ html()->label($label)->class('mb-2.5 font-semibold text-black dark:text-white') }}
    {{isset($required)?html()->span('*')->class('text-danger'):''}}   
    <div class="flex">
        {{ html()->radio($name,$checked,$value)
        ->required(isset($required)?true:false)
        ->id(isset($id)?$id:$name)
        ->class(isset($class)? $class:
        'mr-2 rounded border-[1.5px] bg-transparent py-3 px-5 font-medium outline-none
        transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter
        dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary' .
        ($errors->has($name) ? ' border-red-500' : ' border-stroke'))
        }}
        {{$option}}
        @error($name)
        <div class="border-red-500 text-danger p-2">{{ $message }}</div>
        @enderror
    </div>
</div>