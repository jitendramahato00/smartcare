@extends('backend.layouts.master')
@section('title', 'Locations')

@section('content')
<div class="container">
    <h2>Locations</h2>
    <a href="{{ route('backend.locations.create') }}" class="btn btn-primary mb-3">Add Location</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('backend.locations.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search..." class="form-control w-25 d-inline-block">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>District</th>
                <th>Province</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($locations as $location)
                <tr>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->district }}</td>
                    <td>{{ $location->province }}</td>
                    <td>
                        <a href="{{ route('backend.locations.edit', $location->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('backend.locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this location?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No locations found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $locations->links() }}
</div>
@endsection
