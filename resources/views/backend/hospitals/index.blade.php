@extends('backend.layouts.master')
@section('title', 'Hospitals')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Hospital List</h4>
        <a href="{{ route('backend.hospitals.create') }}" class="btn btn-primary">Add Hospital</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Logo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hospitals as $hospital)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $hospital->name }}</td>
                <td>{{ $hospital->address }}</td>
                <td>{{ $hospital->phone }}</td>
                <td>
                    <img src="{{ asset('storage/' . $hospital->logo) }}" alt="logo" width="50">
                </td>
                <td>
                    <a href="{{ route('backend.hospitals.edit', $hospital->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('backend.hospitals.destroy', $hospital->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No hospitals found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $hospitals->links() }}
</div>
@endsection
