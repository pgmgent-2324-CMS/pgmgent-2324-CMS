@extends('layouts.app')

@section('content')

<h2>{{ $teacher->firstname }}</h2>

{{ $teacher->email }}
{{ $teacher->fax }}
{{ $teacher->phone }}

<h2>Courses</h2>
<ul>
@foreach($teacher->courses as $course)
    <li>
        <a href="/course/{{ $course->id }}">
            {{ $course->name }}
        </a>
    </li>
@endforeach
</ul>

@endsection