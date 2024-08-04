<form action="{{ route($action['route'], [$record->id] + $params) }}" method="POST">   
    @csrf
    @method('DELETE')
    <button data-tooltip="{{ $action['placeholder'] ?? 'Delete' }}" type="submit" data-toggle="tooltip"
        class="text-danger bg-transparent border-0" data-placement="top"
        onclick="javascript:return confirm('Are you sure you want to delete?');">
        <i class="bi bi-trash"></i>
    </button>
</form>
