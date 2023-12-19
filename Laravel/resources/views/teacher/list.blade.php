@extends('layouts.myapp')

@section('content')

<h2>Teacher list</h2>

<form>
    @csrf
    <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
    <select name="country">
        <option value="">All countries</option>
        @foreach($countries as $item)
            <option value="{{ $item->country }}" {{ ( request('country')  == $item->country) ? 'selected' : '' }}>{{ $item->country }} ({{ $item->total }})</option>
        @endforeach
    </select>
    <button type="submit">Search</button>
</form>

<div id="teachers">
@foreach($teachers as $teacher)
    <p>
        <a href="/teacher/{{ $teacher->id }}">
            {{ $teacher->getFullName() }}
            @foreach ($teacher->courses as $course)
                {{ $course->name }}
            @endforeach
        </a>
    </p>
@endforeach
</div>

{{ $teachers->links() }}

@endsection