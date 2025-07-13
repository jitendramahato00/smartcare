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


<form action='{{route("site.settings.update")}}' method="POST">
  <div class="mb-3">
    <label for="sitename" class="form-label">Site Name</label>
    <input type="text" class="form-control" id="sitename" aria-describedby="emailHelp" name="sitename" value="{{ old('sitename', $setting['sitename'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input type="file" class="form-control" id="logo" name="logo" value="{{ old('logo', $setting['logo'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">address</label>
    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $setting['address'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone', $setting['phone'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $setting['email'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="facebook" class="form-label">Facebook</label>
    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $setting['facebook'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="twitter" class="form-label">Twitter</label>
    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', $setting['twitter'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="linkedin" class="form-label">Linkedin</label>
    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $setting['linkedin'] ?? '') }}">
  </div>
  <div class="mb-3">
    <label for="instagram" class="form-label">Instagram</label>
    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $setting['instagram'] ?? '') }}">
  </div>
  
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection