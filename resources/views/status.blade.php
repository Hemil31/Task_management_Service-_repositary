<form action="{{ route('tasks.update-status', $task->uuid) }}" method="POST">
    @csrf
    @method('PUT')
    <select name="status" class="form-control" onchange="this.form.submit()">
        @foreach (App\Enums\Status::cases() as $status)
            <option value="{{ $status->value }}" {{ $task->status->value === $status->value ? 'selected' : '' }}>
                {{ $status->label() }}
            </option>
        @endforeach
    </select>
</form>
