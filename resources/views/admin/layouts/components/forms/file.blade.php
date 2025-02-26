<div class="mb-4.5 w-full">
    {{ html()->label($label)->class('font-semibold text-black dark:text-white') }}
    {{isset($required)?html()->span('*')->class('text-danger'):''}}
    {{ html()->file($name, isset($value)?$model->$name:null)
    ->required(isset($required)?true:false)
    ->id(isset($id)?$id:$name)
    ->class(isset($class)? $class:
    'w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition mt-2.5 
    file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke
    file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary
    active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input
    dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary' .
    ($errors->has($name) ? ' border-red-500' : ' border-stroke'), )
    }}
    @error($name)
    <div class="border-red-500 text-danger p-2">{{ $message }}</div>
    @enderror
</div>