@extends('layouts.app')

@section('title', '500 Internal Server Error')

@section('content')
    <div class="text-center py-5">
        <h1>500 | Internal Server Error</h1>
        <p>That was a fault on our side, not yours. Please try again in a little while.</p>
        <a href="{{ url('/') }}" class="btn btn-secondary">Go to the home page</a>
    </div>
@endsection