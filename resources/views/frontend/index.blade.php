@extends('frontend.layouts.master')
@section('title', 'index')
@section('content')

  {{-- Hidden Login Form --}}
  @include('frontend.sections.reportform')

  {{-- Hero Section --}}
  @include('frontend.sections.herosection')

  {{-- signup form --}}  
  @include('frontend.signup')

  {{-- login form  --}}
  @include('frontend.login')

  {{-- Footer Section --}}

 

  {{-- Contact Section --}}
 




@endsection
