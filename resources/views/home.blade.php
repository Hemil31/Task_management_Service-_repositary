@extends('layouts.master')
@section('title', 'Homepage')
@section('content')
    <div class="container">
        @if ($userdata->isEmpty())
            <h2>Please add a task.</h2>
        @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Sr.no</th>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = 1;
                    @endphp
                    <!-- Your table rows will be dynamically generated based on your database entries -->
                    @foreach ($userdata as $task)
                        <tr>
                            <td>{{ $id++ }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td style="max-width: 100px; word-wrap: break-word;">{{ $task->description }}</td>
                            <td>{{ date('d-m-Y', strtotime($task->due_date)) }}</td>
                            <td>
                                <form action="{{ route('tasks.update-status', $task->uuid) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option value="todo" {{ $task->status == 'todo' ? 'selected' : '' }}>To Do</option>
                                        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>
                                            In
                                            Progress</option>
                                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                                            Completed
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('delete', $task->uuid) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> <a href="{{ route('edit', $task->uuid) }}" class="btn btn-danger"> Edit </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
