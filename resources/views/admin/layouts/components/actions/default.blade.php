<a href="{{ route($action['route'], [$record->id] + $params) }}" data-tooltip="{{ $action['placeholder'] ?? 'Edit' }}">
    <i class="{{ $action['icon'] }}"></i>
</a>
