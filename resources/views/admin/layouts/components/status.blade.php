<button
    class="inline-flex rounded {{ $model->status ? 'bg-emerald-700' : 'bg-danger' }} py-1 px-2 text-sm font-medium text-white hover:bg-opacity-90">
    {{ config('dropdown.status.' . $model->status) }}
</button>
<div class="bg-emerald-50"></div>
