@extends('backend.layouts.master')
@section('title','Edit-User')
@section('content')
<div class="container">
    <h2>Edit User</h2>

    <form action="{{ route('backend.users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label>New Password <small>(Leave blank to keep current)</small></label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="">-- Select Role --</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="doctor" {{ $user->role == 'doctor' ? 'selected' : '' }}>Doctor</option>
                <option value="patient" {{ $user->role == 'patient' ? 'selected' : '' }}>Patient</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
