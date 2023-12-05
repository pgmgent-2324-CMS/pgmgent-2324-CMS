@extends('layouts.app')

@section('content')

<h2>{{ $teacher->firstname }}</h2>

{{ $teacher->email }}
{{ $teacher->fax }}
{{ $teacher->phone }}

@endsection