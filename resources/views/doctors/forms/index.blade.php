@extends('doctors.layouts.master')
@section('title','Doctor-List')
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
                <h3 class="page-title">Doctors List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Doctors</li>
                </ul>
            </div>
            <div class="col-sm-5 col">
                <a href='{{route("doctors.create")}}'  class="btn btn-primary float-right mt-2">Add New Doctor</a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>photo</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Biography</th>
                            <th>Clinic Name</th>
                            <th>Clinic Address</th>
                            <!-- ===== बदलाव 1: ये दो नए हेडर जोड़ें ===== -->
                            <th>Duty Start Time</th>
                            <th>Duty End Time</th>
                            <!-- ====================================== -->
                            <th>Address Line 1</th>
                            <th>Address Line 2</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Postal Code</th>
                            <th>Pricing Type</th>
                            <th>Custom Price</th>
                            <th>Services</th>
                            <th>Specialization</th>
                            <th>Degree</th>
                            <th>College</th>
                            <th>Year of Completion</th>
                            <th>Hospital Name</th>
                            <th>Experience From</th>
                            <th>Experience To</th>
                            <th>Designation</th>
                            <th>Award</th>
                            <th>Award Year</th>
                            <th>Memberships</th>
                            <th>Registration Number</th>
                            <th>Registration Year</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>

               <tbody>
    @forelse($hospitals as $hospital)
        <tr>
            <td>{{ $hospital->id }}</td>
            <td>
                @if($hospital->photo)
                    <img src="{{ asset('storage/' . $hospital->photo) }}" alt="Doctor Photo" class="rounded-circle" width="50">
                @else
                    <img src="{{ asset('assets/img/doctors/doctor-thumb-01.jpg') }}" alt="Default Avatar" class="rounded-circle" width="50">
                @endif
            </td>
            <td>{{ $hospital->username }}</td>
            <td>{{ $hospital->email }}</td>
            <td>{{ $hospital->first_name }}</td>
            <td>{{ $hospital->last_name }}</td>
            <td>{{ $hospital->phone }}</td>
            <td>{{ $hospital->gender }}</td>
            <td>{{ $hospital->date_of_birth ? $hospital->date_of_birth->format('d M, Y') : '' }}</td>
            <td>{{ Str::limit($hospital->biography, 30) }}</td>
            <td>{{ $hospital->clinic_name }}</td>
            <td>{{ $hospital->clinic_address }}</td>

            <!-- ===== बदलाव 2: ये दो नए कॉलम डेटा के साथ जोड़ें ===== -->
            <td>{{ $hospital->duty_start_time ? date('h:i A', strtotime($hospital->duty_start_time)) : '' }}</td>
            <td>{{ $hospital->duty_end_time ? date('h:i A', strtotime($hospital->duty_end_time)) : '' }}</td>
            <!-- ===================================================== -->

            <td>{{ $hospital->address_line_1 }}</td>
            <td>{{ $hospital->address_line_2 }}</td>
            <td>{{ $hospital->city }}</td>
            <td>{{ $hospital->state }}</td>
            <td>{{ $hospital->country }}</td>
            <td>{{ $hospital->postal_code }}</td>
            <td>{{ $hospital->pricing_type }}</td>
            <td>{{ $hospital->custom_price }}</td>
            <td>{{ $hospital->services }}</td>
            <td>{{ $hospital->specialization }}</td>
            <td>{{ $hospital->degree }}</td>
            <td>{{ $hospital->college }}</td>
            <td>{{ $hospital->year_of_completion }}</td>
            <td>{{ $hospital->hospital_name }}</td>
            <td>{{ $hospital->experience_from }}</td>
            <td>{{ $hospital->experience_to }}</td>
            <td>{{ $hospital->designation }}</td>
            <td>{{ $hospital->award }}</td>
            <td>{{ $hospital->award_year }}</td>
            
            <td>
                @if(is_array($hospital->memberships))
                    {{ implode(', ', $hospital->memberships) }}
                @else
                    {{ $hospital->memberships }}
                @endif
            </td>
            
            <td>{{ $hospital->registration_number }}</td>
            <td>{{ $hospital->registration_year }}</td>
            <td>
                <div class="status-toggle">
                    <input type="checkbox" id="status_{{ $hospital->id }}" class="check" {{ $hospital->status ? 'checked' : '' }}>
                    <label for="status_{{ $hospital->id }}" class="checktoggle">checkbox</label>
                </div>
            </td>
            <td class="text-right">
                <div class="actions">
                    <a href="{{ route('doctors.edit', $hospital->id) }}" class="btn btn-sm bg-success-light">
                        <i class="fe fe-pencil"></i> Edit
                    </a>
                    <form action="{{ route('forms.destroy', $hospital->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm bg-danger-light">
                            <i class="fe fe-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <!-- ===== बदलाव 3: colspan को 36 से 38 करें ===== -->
            <td colspan="38" class="text-center">No Doctors Found.</td>
            <!-- ============================================== -->
        </tr>
    @endforelse
</tbody>

                </table>
            </div>
        </div>
    </div>
@endsection