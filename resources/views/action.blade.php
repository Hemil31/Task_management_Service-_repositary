<form method="POST" action="{{ route('delete', $task->uuid ?? '') }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

<a href="{{ route('edit', $task->uuid ?? '') }}" class="btn btn-danger">Edit</a>

