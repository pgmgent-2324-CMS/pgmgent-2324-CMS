@extends('layouts.app')

@section('content')

<h2>Teacher list</h2>

@foreach($teachers as $teacher)
    <p>
        <a href="/teacher/{{ $teacher->id }}">
            {{ $teacher->firstname . ' ' . $teacher->lastname }}
        </a>
    </p>
@endforeach

@endsection