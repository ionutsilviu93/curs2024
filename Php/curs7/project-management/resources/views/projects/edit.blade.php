@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $project->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $project->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="deleted" {{ $project->status == 'deleted' ? 'selected' : '' }}>Deleted</option>
                </select>
            </div>
            <div class="form-group">
                <label for="responsible_first_name">Responsible First Name</label>
                <input type="text" name="responsible_first_name" class="form-control" value="{{ $project->responsible_first_name }}" required>
            </div>
            <div class="form-group">
                <label for="responsible_last_name">Responsible Last Name</label>
                <input type="text" name="responsible_last_name" class="form-control" value="{{ $project->responsible_last_name }}" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ $project->start_date }}" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ $project->end_date }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
