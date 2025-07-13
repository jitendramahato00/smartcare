@extends('backend.layouts.master')
@section('title','site setting')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action='{{route("site.settings.update")}}' method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="sitename" class="form-label">Site Name</label>
    <input type="text" class="form-control" id="sitename" aria-describedby="emailHelp" name="sitename" value="{{ old('sitename', $settings['sitename'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">address</label>
    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $settings['address'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="facebook" class="form-label">Facebook</label>
    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $settings['facebook'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="twitter" class="form-label">Twitter</label>
    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', $settings['twitter'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="linkedin" class="form-label">Linkedin</label>
    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="instagram" class="form-label">Instagram</label>
    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? '') }}">
  </div>
   <div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input type="file" class="form-control" id="logo" name="logo" value="{{ old('logo', $settings['logo'] ?? '') }}">

        @if(!empty($settings['logo']))
        <div class="mt-2">
          <p>Current Logo:</p>
          <img src="{{ asset($settings['logo']) }}" alt="Site Logo" style="max-height: 100px;">
        </div>
        @endif
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection