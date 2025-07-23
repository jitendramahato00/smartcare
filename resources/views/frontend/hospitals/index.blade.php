@extends('frontend.hospitals.layouts.master')
@section('title', 'index')
@section('content')

 

  {{-- Hero Section --}}
 
  @include('frontend.hospitals.sections.herosection')
   @include('frontend.hospitals.sections.doctors')
  
 
  @include('frontend.hospitals.sections.features')
  @include('frontend.hospitals.sections.speciality')

  


 



 




@endsection
