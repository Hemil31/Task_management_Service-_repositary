@extends('layouts.master')
@section('title', 'edittask')
@section('content')
    <div class="container">
        <h2>Add Task</h2>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="task_name">Task Name:</label>
                <input type="text" class="form-control" id="task_name" name="task_name"  value="{{ $task->task_name }}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input type="date" class="form-control" id="due_date" name="due_date"  value="{{ $task->due_date }}">
            </div><br>
            <button type="submit" class="btn btn-primary">Edit Task</button>
        </form>
    </div>

@endsection
