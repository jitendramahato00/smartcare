@extends('backend.layouts.master')
@section('title', 'Add Hospital')

@section('content')
<div class="container mt-4">
    <h4>Add New Hospital</h4>

    <form action="{{ route('backend.hospitals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('backend.hospitals._form', ['buttonText' => 'Create'])

    </form>
</div>
@endsection
