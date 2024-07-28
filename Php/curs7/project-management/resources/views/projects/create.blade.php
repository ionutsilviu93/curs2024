@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Project</h1>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="deleted">Deleted</option>
                </select>
            </div>
            <div class="form-group">
                <label for="responsible_first_name">Responsible First Name</label>
                <input type="text" name="responsible_first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="responsible_last_name">Responsible Last Name</label>
                <input type="text" name="responsible_last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
