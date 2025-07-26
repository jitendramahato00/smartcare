
@extends('doctors.layouts.master')
@section('title','Edit Doctor')
@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div>
@endif

<div class="page-header">
    <div class="row">
        <div class="col-sm-7 col-auto">
            <h3 class="page-title">Edit Doctor</h3>
            <ul class="breadcrumb">
               
                <li class="breadcrumb-item active">Edit Doctor</li>
            </ul>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('doctor.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="{{ old('username', $hospital->username) }}" required>
                        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $hospital->email) }}" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $hospital->first_name) }}" required>
                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $hospital->last_name) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $hospital->phone) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender', $hospital->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $hospital->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender', $hospital->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $hospital->date_of_birth ? $hospital->date_of_birth->format('Y-m-d') : '') }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Biography</label>
                        <textarea name="biography" class="form-control">{{ old('biography', $hospital->biography) }}</textarea>
                    </div>
                </div>

                {{-- Clinic Details --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Clinic Name</label>
                        <input type="text" name="clinic_name" class="form-control" value="{{ old('clinic_name', $hospital->clinic_name) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Clinic Address</label>
                        <input type="text" name="clinic_address" class="form-control" value="{{ old('clinic_address', $hospital->clinic_address) }}">
                    </div>
                </div>

                {{-- Duty Times --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Duty Start Time</label>
                        <input type="time" name="duty_start_time" class="form-control" value="{{ old('duty_start_time', $hospital->duty_start_time) }}">
                        @error('duty_start_time') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Duty End Time</label>
                        <input type="time" name="duty_end_time" class="form-control" value="{{ old('duty_end_time', $hospital->duty_end_time) }}">
                        @error('duty_end_time') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Address Fields --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address Line 1</label>
                        <input type="text" name="address_line_1" class="form-control" value="{{ old('address_line_1', $hospital->address_line_1) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address Line 2</label>
                        <input type="text" name="address_line_2" class="form-control" value="{{ old('address_line_2', $hospital->address_line_2) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city', $hospital->city) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" name="state" class="form-control" value="{{ old('state', $hospital->state) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country', $hospital->country) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $hospital->postal_code) }}">
                    </div>
                </div>

                {{-- Pricing --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pricing Type</label>
                        <select name="pricing_type" class="form-control">
                            <option value="">Select Pricing Type</option>
                            <option value="free" {{ old('pricing_type', $hospital->pricing_type) == 'free' ? 'selected' : '' }}>Free</option>
                            <option value="custom" {{ old('pricing_type', $hospital->pricing_type) == 'custom' ? 'selected' : '' }}>Custom</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Custom Price</label>
                        <input type="number" name="custom_price" class="form-control" value="{{ old('custom_price', $hospital->custom_price) }}">
                    </div>
                </div>

                {{-- Services (Now a simple text input) --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Services</label>
                        <input type="text" name="services" class="form-control" value="{{ old('services', (string)$hospital->services) }}">
                    </div>
                </div>

                {{-- Specialization (Now a simple text input) --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Specialization</label>
                        <input type="text" name="specialization" class="form-control" value="{{ old('specialization', (string)$hospital->specialization) }}">
                    </div>
                </div>

                {{-- Degree --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Degree</label>
                        <input type="text" name="degree" class="form-control" value="{{ old('degree', (string)$hospital->degree) }}">
                    </div>
                </div>
                {{-- College --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>College</label>
                        <input type="text" name="college" class="form-control" value="{{ old('college', (string)$hospital->college) }}">
                    </div>
                </div>
                {{-- Year of Completion --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Year of Completion</label>
                        <input type="text" name="year_of_completion" class="form-control" value="{{ old('year_of_completion', (string)$hospital->year_of_completion) }}">
                    </div>
                </div>
                {{-- Hospital Name (for experience) --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hospital Name (Experience)</label>
                        <input type="text" name="hospital_name" class="form-control" value="{{ old('hospital_name', (string)$hospital->hospital_name) }}">
                    </div>
                </div>
                {{-- Experience From --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Experience From</label>
                        <input type="date" name="experience_from" class="form-control" value="{{ old('experience_from', (string)$hospital->experience_from) }}">
                    </div>
                </div>
                {{-- Experience To --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Experience To</label>
                        <input type="date" name="experience_to" class="form-control" value="{{ old('experience_to', (string)$hospital->experience_to) }}">
                    </div>
                </div>
                {{-- Designation --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control" value="{{ old('designation', (string)$hospital->designation) }}">
                    </div>
                </div>
                {{-- Award --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Award</label>
                        <input type="text" name="award" class="form-control" value="{{ old('award', (string)$hospital->award) }}">
                    </div>
                </div>
                {{-- Award Year --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Award Year</label>
                        <input type="text" name="award_year" class="form-control" value="{{ old('award_year', (string)$hospital->award_year) }}">
                    </div>
                </div>

                {{-- Memberships (Now a simple text input) --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Memberships</label>
                        <input type="text" name="memberships" class="form-control" value="{{ old('memberships', (string)$hospital->memberships) }}">
                    </div>
                </div>

                {{-- Registration Number --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" name="registration_number" class="form-control" value="{{ old('registration_number', (string)$hospital->registration_number) }}">
                    </div>
                </div>
                {{-- Registration Year --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Registration Year</label>
                        <input type="text" name="registration_year" class="form-control" value="{{ old('registration_year', (string)$hospital->registration_year) }}">
                    </div>
                </div>

                {{-- Photo --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control">
                        @if($hospital->photo)
                            <img src="{{ asset('storage/' . $hospital->photo) }}" alt="Current Photo" width="100" class="mt-2">
                        @endif
                    </div>
                </div>

                {{-- Status Toggle (if you have one) --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <div class="status-toggle">
                            <input type="checkbox" id="status_edit" name="status" class="check" {{ old('status', $hospital->status) ? 'checked' : '' }}>
                            <label for="status_edit" class="checktoggle">checkbox</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="submit-section text-center">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
{{-- Select2 initialization script ko hata diya gaya hai kyunki ab koi multi-select fields nahi hain --}}
@endpush