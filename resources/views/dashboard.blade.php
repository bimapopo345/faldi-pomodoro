@extends('layouts.app')

@section('content')
    <h2>Welcome, {{ auth()->user()->name }}!</h2>
    <p>You are logged in as {{ auth()->user()->email }}.</p>
@endsection
