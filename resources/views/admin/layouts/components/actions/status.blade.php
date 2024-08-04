@can($action['permission'])
    <a data-tooltip="{{ $action['placeholder'] ?? 'Change Status' }}" type="button" href="{{route($action['route'],[$record->id] + $params)}}" data-toggle="tooltip" class="text-{{ $record->status ? 'emerald-600' : 'danger' }}" data-placement="top">
        <i class="{{ $record->status  ? 'bi bi-check-circle' : 'bi bi-x-circle' }}"></i>
    </a>
@endcan


