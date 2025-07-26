@extends('backend.layouts.master')
@section('title', 'Edit Hospital')

@section('content')
<div class="container mt-4">
    <h4>Edit Hospital</h4>

    <form action="{{ route('backend.hospitals.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('backend.hospitals._form', ['buttonText' => 'Update'])

    </form>
</div>
@endsection
