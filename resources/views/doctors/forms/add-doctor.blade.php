
@extends('doctors.layouts.master')
@section('title','Add-form')
@section('content')


<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
                <!-- Sidebar -->
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ asset('assets/img/doctors/doctor-thumb-02.jpg') }}" alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="photo">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        {{-- CORRECTED NAME: 'phone' --}}
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control select" name="gender">
                                            <option value="">Select</option>
                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select" name="status">
                                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Basic Information -->

                    <!-- About Me -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">About Me</h4>
                            <div class="form-group mb-0">
                                <label>Biography</label>
                                <textarea class="form-control" rows="5" name="biography">{{ old('biography') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /About Me -->

                    <!-- Clinic Info -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Clinic Info</h4>
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic Name</label>
                                        <input type="text" class="form-control" name="clinic_name" value="{{ old('clinic_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Clinic Address</label>
                                        <input type="text" class="form-control" name="clinic_address" value="{{ old('clinic_address') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Clinic Info -->


                      <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Doctor's Duty Hours</h4>
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input type="time" class="form-control" name="duty_start_time" value="{{ old('duty_start_time') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <input type="time" class="form-control" name="duty_end_time" value="{{ old('duty_end_time') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="card contact-card">
                        <div class="card-body">
                            <h4 class="card-title">Contact Details</h4>
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address Line 1</label>
                                        <input type="text" class="form-control" name="address_line_1" value="{{ old('address_line_1') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input type="text" class="form-control" name="address_line_2" value="{{ old('address_line_2') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>State / Province</label>
                                        {{-- CORRECTED NAME: 'state' --}}
                                        <input type="text" class="form-control" name="state" value="{{ old('state') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" value="{{ old('postal_code') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Contact Details -->

                    <!-- Pricing -->
                    
<!-- Pricing -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Pricing</h4>
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="price_free" name="pricing_type" class="custom-control-input" value="free" {{ old('pricing_type', 'free') == 'free' ? 'checked' : '' }}>
                <label class="custom-control-label" for="price_free">Free</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="price_custom" name="pricing_type" class="custom-control-input" value="custom" {{ old('pricing_type') == 'custom' ? 'checked' : '' }}>
                <label class="custom-control-label" for="price_custom">Custom Price</label>
            </div>
        </div>

        <!-- यह कस्टम प्राइस डालने वाला बॉक्स है -->
        <div class="row" id="custom_price_container" style="display: none;">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Enter Price</label>
                    <input type="text" class="form-control" name="custom_price" value="{{ old('custom_price') }}" placeholder="e.g. 500">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Pricing -->

                    <!-- Services and Specialization -->
                    <div class="card services-card">
                        <div class="card-body">
                            <h4 class="card-title">Services and Specialization</h4>
                            <div class="form-group">
                                <label>Services</label>
                                <input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services and press enter" name="services" value="{{ old('services') }}">
                            </div> 
                            <div class="form-group mb-0">
                                <label>Specialization</label>
                                <input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization and press enter" name="specialization" value="{{ old('specialization') }}">
                            </div> 
                        </div>              
                    </div>
                    <!-- /Services and Specialization -->

                    <!-- Education -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Education</h4>
                            <div class="education-info">
                                <div class="row form-row education-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Degree</label>
                                                    {{-- CORRECTED NAME: 'degree[]' --}}
                                                    <input type="text" class="form-control" name="degree[]">
                                                </div> 
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>College/Institute</label>
                                                    {{-- CORRECTED NAME: 'college[]' --}}
                                                    <input type="text" class="form-control" name="college[]">
                                                </div> 
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Year of Completion</label>
                                                    {{-- CORRECTED NAME: 'year_of_completion[]' --}}
                                                    <input type="text" class="form-control" name="year_of_completion[]">
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Education -->

                    <!-- Experience -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Experience</h4>
                            <div class="experience-info">
                                <div class="row form-row experience-cont">
                                    <div class="col-12 col-md-10 col-lg-11">
                                        <div class="row form-row">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    {{-- CORRECTED NAME: 'hospital_name[]' --}}
                                                    <input type="text" class="form-control" name="hospital_name[]">
                                                </div> 
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>From</label>
                                                    <input type="text" class="form-control" name="experience_from[]">
                                                </div> 
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <input type="text" class="form-control" name="experience_to[]">
                                                </div> 
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    {{-- CORRECTED NAME: 'designation[]' --}}
                                                    <input type="text" class="form-control" name="designation[]">
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Experience -->

                    <!-- Awards -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Awards</h4>
                            <div class="awards-info">
                                <div class="row form-row awards-cont">
                                    <div class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label>Awards</label>
                                            {{-- CORRECTED NAME: 'award[]' --}}
                                            <input type="text" class="form-control" name="award[]">
                                        </div> 
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label>Year</label>
                                            {{-- CORRECTED NAME: 'award_year[]' --}}
                                            <input type="text" class="form-control" name="award_year[]">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Awards -->

                    <!-- Memberships -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Memberships</h4>
                            <div class="membership-info">
                                <div class="row form-row membership-cont">
                                    <div class="col-12 col-md-10 col-lg-5">
                                        <div class="form-group">
                                            <label>Memberships</label>
                                            <input type="text" class="form-control" name="memberships[]">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Memberships -->

                    <!-- Registrations -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Registrations</h4>
                            <div class="registrations-info">
                                <div class="row form-row reg-cont">
                                    <div class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label>Registration Number</label>
                                            {{-- CORRECTED NAME: 'registration_number[]' --}}
                                            <input type="text" class="form-control" name="registration_number[]">
                                        </div> 
                                    </div>
                                    <div class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label>Year</label>
                                            {{-- CORRECTED NAME: 'registration_year[]' --}}
                                            <input type="text" class="form-control" name="registration_year[]">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Registrations -->

                    <div class="submit-section submit-btn-bottom">
                        <button type="submit" class="btn btn-primary submit-btn">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>      



@endsection
@push('scripts')
<script>
$(document).ready(function() {
    // यह फंक्शन रेडियो बटन के बदलने पर चलता है
    function togglePriceInput() {
        if ($('#price_custom').is(':checked')) {
            $('#custom_price_container').show();
        } else {
            $('#custom_price_container').hide();
        }
    }

    // पेज लोड होने पर इसे एक बार चलाएं (ताकि अगर validation error के बाद पेज रिफ्रेश हो तो सही ऑप्शन दिखे)
    togglePriceInput();

    // जब भी कोई रेडियो बटन बदला जाए, तो फंक्शन को फिर से चलाएं
    $('input[name="pricing_type"]').on('change', function() {
        togglePriceInput();
    });
});
</script>
@endpush