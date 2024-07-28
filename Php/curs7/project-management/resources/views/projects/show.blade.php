@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->name }}</h1>
        <p>{{ $project->description }}</p>
        <p>Status: {{ $project->status }}</p>
        <p>Responsible: {{ $project->responsible_first_name }} {{ $project->responsible_last_name }}</p>
        <p>Start Date: {{ $project->start_date }}</p>
        <p>End Date: {{ $project->end_date }}</p>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
