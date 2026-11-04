@extends('layouts.app')

@section('title', 'Page not found')

@section('content')
    <div class="text-center py-5">
        <h1>Page not found</h1>
        <p>We couldn't find that page. Check the address, or head back to the subject list.</p>
        <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back to the list</a>
    </div>
@endsection