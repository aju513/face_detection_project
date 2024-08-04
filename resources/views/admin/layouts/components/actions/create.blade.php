@if ($action)
    @can($action['permission'])
        <a href="{{ route($action['route'], $params) }}"
            class="inline-flex items-center justify-center rounded-md border bg-primary py-2 px-5 text-white text-center text-xl font-medium  hover:bg-blue-500 hover:text-white lg:px-5 xl:px-5">
            <i class="bi bi-plus me-2"></i>
           Add
        </a>
    @endcan
@endif
