@extends('layouts.app')

@section('header')
    New header
@endsection

@section('content')

<h2>Hello {{ $name }}</h2>

@foreach($messages as $message)
    <p><a href="/hello/{{ $message->id }}">{{ $message->name }}</a></p>
@endforeach

@endsection