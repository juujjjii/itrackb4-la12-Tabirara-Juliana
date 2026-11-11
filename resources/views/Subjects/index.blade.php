
@extends('layouts.app')

@section('title', 'My Subjects List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">My Subjects List</h1>
    <a href="{{ route('subjects.create') }}" class="btn btn-success">
        + Add Subject
    </a>
</div>

{{-- Search and Filter Form --}}
<form method="GET" action="{{ route('subjects.index') }}" class="mb-4">
    <div class="row g-3">

        {{-- Search by Code --}}
        <div class="col-md-4">
            <input
                type="text"
                name="code"
                id="code"
                class="form-control"
                placeholder="Search subject code"
                value="{{ request('code') }}">
        </div>

        {{-- Filter by Prerequisite --}}
        <div class="col-md-4">
            <select name="prerequisite_id" id="prerequisite_id"
                    class="form-select">
                <option value="">All Prerequisites</option>

                @foreach ($prerequisites as $prerequisite)
                    <option value="{{ $prerequisite->id }}"
                        @selected(request('prerequisite_id') == $prerequisite->id)>
                        {{ $prerequisite->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Filter by Status and Buttons --}}
        <div class="col-md-4">
            <div class="d-flex gap-2">
                <select name="is_active" id="is_active" class="form-select">
                    <option value="">Any Status</option>
                    <option value="1" @selected(request('is_active') === '1')>
                        Active
                    </option>
                    <option value="0" @selected(request('is_active') === '0')>
                        Inactive
                    </option>
                </select>

                <button type="submit" class="btn btn-primary">
                    Apply
                </button>

                <a href="{{ route('subjects.index') }}"
                   class="btn btn-secondary">
                    Clear
                </a>
            </div>
        </div>

    </div>
</form>

{{-- Search Results Description --}}
<p>
    @if (request()->hasAny(['code', 'prerequisite_id', 'is_active']))
        Showing filtered subjects.
    @else
        Showing all subjects.
    @endif
</p>

{{-- Subjects Table --}}
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Code</th>
            <th>Title</th>
            <th>Units</th>
            <th>Prerequisite</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($subjects as $subj)
            <tr>
                <td>{{ $subjects->firstItem() + $loop->index }}</td>
                <td>{{ $subj->id }}</td>

                <td>
                    <a href="{{ route('subjects.show', $subj->id) }}">
                        {{ $subj->code }}
                    </a>
                </td>

                <td>{{ $subj->title }}</td>

                <td>
                    @if ($subj->units >= 3)
                        <strong>{{ $subj->units }} (Heavy Load)</strong>
                    @else
                        {{ $subj->units }}
                    @endif
                </td>

                <td>{{ $subj->prerequisite->name ?? 'None' }}</td>

                <td>
                    <a href="{{ route('subjects.edit', $subj) }}"
                       class="btn btn-primary btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('subjects.destroy', $subj) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Delete this record?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">
                    No subjects match. Try clearing the filters.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination --}}
{{ $subjects->links() }}

@endsection
