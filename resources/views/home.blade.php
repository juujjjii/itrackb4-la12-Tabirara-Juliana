
@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container text-center mt-4">

    <h2>Browse and Manage Academic Subjects</h2>

    <p class="mb-4">
        Explore the available academic subjects, view their details,
        and check their prerequisites and unit information.
    </p>

    <a href="{{ route('subjects.index') }}" class="btn btn-primary mb-4">
        View Subject List
    </a>

    <hr>

    <!-- Profile Information -->
    <div class="d-flex flex-column align-items-center text-center my-4">

        <img src="{{ asset('img/profile.jpg') }}"
             width="120"
             height="120"
             class="rounded-circle mb-3"
             style="object-fit: cover;"
             alt="Profile Photo">

        <h4 class="mb-1">Juliana Tabirara</h4>

        <p class="mb-1">Course: BS Information Technology</p>
        <p class="mb-1">Year: 4th Year</p>
        <p class="mb-1">Block: Your Block</p>

    </div>

    <hr>

    <!-- Database Counts -->
    <div class="row justify-content-center mt-4">

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3">
                <h5>Total Subjects</h5>
                <h2>{{ $subjectCount }}</h2>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3">
                <h5>Total Prerequisites</h5>
                <h2>{{ $prerequisiteCount }}</h2>
            </div>
        </div>

    </div>

</div>

@endsection
