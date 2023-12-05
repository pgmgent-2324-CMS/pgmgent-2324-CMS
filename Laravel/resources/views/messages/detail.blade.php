@extends('layouts.app')


@section('content')

<h2>Bericht van {{ $message->name }}</h2>

<p>{{ $message->message }}</p>

@endsection