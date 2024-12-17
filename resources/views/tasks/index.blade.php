@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Task Management</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Add Task Form --}}
    <form method="POST" action="{{ route('task.store') }}" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="title" class="form-control" placeholder="Task Title" value="{{ old('title') }}" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="description" class="form-control" placeholder="Task Description" value="{{ old('description') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </div>
    </form>

    {{-- Bulk Actions Form --}}
    <form method="POST" action="{{ route('tasks.bulkAction') }}">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                <tr>
                    <td><input type="checkbox" name="task_ids[]" value="{{ $task->id }}"></td>
                    <td>
                        <form method="POST" action="{{ route('task.update', $task->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $task->title }}" class="form-control" onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('task.update', $task->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="description" value="{{ $task->description }}" class="form-control" onchange="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        @if ($task->completed == true)
                        <span class="badge bg-success">Done</span>
                        @else
                        <span class="badge bg-warning">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if ($task->completed == false)
                        <form method="POST" action="{{ route('task.toggleStatus', $task->id) }}" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Mark Done</button>
                        </form>
                        @endif
                        <form method="POST" action="{{ route('task.destroy', $task->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No tasks found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            <button type="submit" name="action" value="mark_done" class="btn btn-success">Mark Selected as Done</button>
            <button type="submit" name="action" value="delete" class="btn btn-danger">Delete Selected</button>
        </div>
    </form>
</div>

<script>
    // Select/Deselect all checkboxes
    document.getElementById('select-all').addEventListener('change', function(e) {
        const checkboxes = document.querySelectorAll('input[name="task_ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
    });
</script>
@endsection