@extends('backend.layouts.master')
@section('title', 'Add Location')

@section('content')
<div class="container">
    <h2>Add New Location</h2>
    <a href="{{ route('backend.locations.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('backend.locations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Location Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="district">District</label>
            <input type="text" class="form-control" name="district" value="{{ old('district') }}" required>
        </div>
        <div class="form-group">
            <label for="province">Province</label>
            <input type="text" class="form-control" name="province" value="{{ old('province') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save Location</button>
    </form>
</div>
@endsection
