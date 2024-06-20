@extends('layouts.master')
@section('title', 'task')
@section('content')
    <div class="container">
        <h2>Add Task</h2>
        <form action="{{ route('add.insert') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="task_name">Task Name:</label>
                <input type="text" class="form-control" id="task_name" name="task_name" value="{{old('task_name')}}">
                @error('task_name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{old('due_date')}}"min="<?php echo date('Y-m-d'); ?>">
            </div>
            @error('due_date')
                {{ $message }}
            @enderror
            <br><br>
            <button type="submit" class="btn btn-primary">Add New Task</button>
        </form>
    </div>

@endsection
