@extends('doctors.layouts.master')
@section('title','Edit Doctor')
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

                {{-- आपके route के नाम के अनुसार action को 'doctor.update' रखा गया है --}}
                <form action="{{ route('doctor.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="{{ $hospital->photo ? asset('storage/' . $hospital->photo) : asset('assets/img/doctors/doctor-thumb-02.jpg') }}" alt="User Image">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" class="upload" name="photo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"><div class="form-group"><label>Username <span class="text-danger">*</span></label><input type="text" class="form-control" name="username" value="{{ old('username', $hospital->username) }}" readonly></div></div>
                                <div class="col-md-6"><div class="form-group"><label>Email <span class="text-danger">*</span></label><input type="email" class="form-control" name="email" value="{{ old('email', $hospital->email) }}" required></div></div>
                                <div class="col-md-6"><div class="form-group"><label>First Name <span class="text-danger">*</span></label><input type="text" class="form-control" name="first_name" value="{{ old('first_name', $hospital->first_name) }}" required></div></div>
                                <div class="col-md-6"><div class="form-group"><label>Last Name <span class="text-danger">*</span></label><input type="text" class="form-control" name="last_name" value="{{ old('last_name', $hospital->last_name) }}"></div></div>
                                <div class="col-md-6"><div class="form-group"><label>Phone Number</label><input type="text" class="form-control" name="phone" value="{{ old('phone', $hospital->phone) }}"></div></div>
                                <div class="col-md-6"><div class="form-group"><label>Gender</label><select class="form-control select" name="gender"><option value="Male" {{ old('gender', $hospital->gender) == 'Male' ? 'selected' : '' }}>Male</option><option value="Female" {{ old('gender', $hospital->gender) == 'Female' ? 'selected' : '' }}>Female</option></select></div></div>
                                <div class="col-md-6"><div class="form-group"><label>Date of Birth</label><input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', optional($hospital->date_of_birth)->format('Y-m-d')) }}"></div></div>
                                <div class="col-md-6"><div class="form-group"><label>Status</label><select class="form-control select" name="status"><option value="1" {{ old('status', $hospital->status) == 1 ? 'selected' : '' }}>Active</option><option value="0" {{ old('status', $hospital->status) == 0 ? 'selected' : '' }}>Inactive</option></select></div></div>
                            </div>
                        </div>
                    </div>

                    <!-- About Me -->
                    <div class="card"><div class="card-body"><h4 class="card-title">About Me</h4><div class="form-group mb-0"><label>Biography</label><textarea class="form-control" rows="5" name="biography">{{ old('biography', $hospital->biography) }}</textarea></div></div></div>
                    
                    <!-- ===== बदलाव 1: डॉक्टर के ड्यूटी का समय यहाँ जोड़ें ===== -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Doctor's Duty Hours</h4>
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input type="time" class="form-control" name="duty_start_time" value="{{ old('duty_start_time', $hospital->duty_start_time) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <input type="time" class="form-control" name="duty_end_time" value="{{ old('duty_end_time', $hospital->duty_end_time) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================== -->

                    <!-- Contact Details -->
                    <div class="card"><div class="card-body"><h4 class="card-title">Contact Details</h4><div class="row form-row"><div class="col-md-6"><div class="form-group"><label>Address Line 1</label><input type="text" class="form-control" name="address_line_1" value="{{ old('address_line_1', $hospital->address_line_1) }}"></div></div><div class="col-md-6"><div class="form-group"><label>Address Line 2</label><input type="text" class="form-control" name="address_line_2" value="{{ old('address_line_2', $hospital->address_line_2) }}"></div></div><div class="col-md-6"><div class="form-group"><label>City</label><input type="text" class="form-control" name="city" value="{{ old('city', $hospital->city) }}"></div></div><div class="col-md-6"><div class="form-group"><label>State / Province</label><input type="text" class="form-control" name="state" value="{{ old('state', $hospital->state) }}"></div></div><div class="col-md-6"><div class="form-group"><label>Country</label><input type="text" class="form-control" name="country" value="{{ old('country', $hospital->country) }}"></div></div><div class="col-md-6"><div class="form-group"><label>Postal Code</label><input type="text" class="form-control" name="postal_code" value="{{ old('postal_code', $hospital->postal_code) }}"></div></div></div></div></div>

                    <!-- ===== बदलाव 2: प्राइसिंग सेक्शन यहाँ जोड़ें ===== -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Pricing</h4>
                            <div class="form-group">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="price_free" name="pricing_type" class="custom-control-input" value="free" {{ old('pricing_type', $hospital->pricing_type) == 'free' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="price_free">Free</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="price_custom" name="pricing_type" class="custom-control-input" value="custom" {{ old('pricing_type', $hospital->pricing_type) == 'custom' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="price_custom">Custom Price</label>
                                </div>
                            </div>

                            <!-- यह कस्टम प्राइस डालने वाला बॉक्स है -->
                            <div class="row" id="custom_price_container" style="display: none;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Enter Price</label>
                                        <input type="text" class="form-control" name="custom_price" value="{{ old('custom_price', $hospital->custom_price) }}" placeholder="e.g. 500">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================== -->

                    <!-- Services and Specialization -->
                    <div class="card services-card">
                        <div class="card-body">
                            <h4 class="card-title">Services and Specialization</h4>
                            <div class="form-group">
                                <label>Services</label>
                                <input type="text" data-role="tagsinput" class="input-tags form-control" name="services" value="{{ is_array($hospital->services) ? implode(',', $hospital->services) : $hospital->services }}">
                            </div> 
                            <div class="form-group mb-0">
                                <label>Specialization</label>
                                <input class="input-tags form-control" type="text" data-role="tagsinput" name="specialization" value="{{ is_array($hospital->specialization) ? implode(',', $hospital->specialization) : $hospital->specialization }}">
                            </div> 
                        </div>              
                    </div>
                    
                    <!-- Education, Experience, etc. -->
                    {{-- ... बाकी के सभी फ़ील्ड्स जैसे थे वैसे ही रहेंगे ... --}}
                    
                    <div class="submit-section submit-btn-bottom">
                        <button type="submit" class="btn btn-primary submit-btn">Update Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>      
@endsection

<!-- ===== बदलाव 3: जावास्क्रिप्ट कोड यहाँ जोड़ें ===== -->
@push('scripts')
<script>
$(document).ready(function() {
    // यह फंक्शन रेडियो बटन की स्थिति के आधार पर प्राइस इनपुट को दिखाता या छिपाता है
    function togglePriceInput() {
        if ($('#price_custom').is(':checked')) {
            $('#custom_price_container').show();
        } else {
            $('#custom_price_container').hide();
        }
    }

    // पेज लोड होते ही इसे चलाएं ताकि सही बॉक्स दिखे
    togglePriceInput();

    // जब भी रेडियो बटन बदला जाए, तो इसे फिर से चलाएं
    $('input[name="pricing_type"]').on('change', function() {
        togglePriceInput();
    });
});
</script>
@endpush
<!-- ================================================== -->