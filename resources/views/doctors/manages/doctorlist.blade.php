@extends('doctors.layouts.master')
@section('title','Doctor-Add')
@section('content')


	           <div class="page-header">
						<div class="row">
							<div class="col-sm-7 col-auto">
								<h3 class="page-title">Specialities</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Specialities</li>
								</ul>
							</div>
							<div class="col-sm-5 col">
								<a href='{{ route("forms.add-doctor") }}'  class="btn btn-primary float-right mt-2">Add</a>
							</div>
						</div>
					</div>




		

<!-- doccure/doctor-profile-settings.html  30 Nov 2019 04:12:15 GMT -->
                    <div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-hover table-center mb-0">
										<thead>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Gender</th>
                                                    <th>Date of Birth</th>
                                                    <th>Biography</th>
                                                    <th>Clinic Name</th>
                                                    <th>Clinic Address</th>
                                                    <th>Clinic Images</th>
                                                    <th>Address Line 1</th>
                                                    <th>Address Line 2</th>
                                                    <th>City</th>
                                                    <th>State / Province</th>
                                                    <th>Country</th>
                                                    <th>Postal Code</th>
                                                    <th>Pricing Type</th>
                                                    <th>Custom Price</th>
                                                    <th>Services</th>
                                                    <th>Specialization</th>
                                                    <th>Degree</th>
                                                    <th>College/Institute</th>
                                                    <th>Year of Completion</th>
                                                    <th>Hospital Name</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Designation</th>
                                                    <th>Awards</th>
                                                    <th>Award Year</th>
                                                    <th>Memberships</th>
                                                    <th>Registrations</th>
                                                    <th>Registration Year</th>
                                                    <th>Status</th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>



										<tbody>
                                            <tr>
                                                <td><img src="doctor1.jpg" alt="Doctor Photo" width="40"></td>
                                                <td>dr.jitendra</td>
                                                <td>jitendra@example.com</td>
                                                <td>Jitendra</td>
                                                <td>Mahato</td>
                                                <td>9800000000</td>
                                                <td>Male</td>
                                                <td>1995-11-10</td>
                                                <td>Experienced and caring physician with over 10 years in general medicine.</td>
                                                <td>SmartCare Clinic</td>
                                                <td>Birgunj, Nepal</td>
                                                <td><img src="clinic1.jpg" width="40"> <img src="clinic2.jpg" width="40"></td>
                                                <td>Main Road</td>
                                                <td>Ward No. 5</td>
                                                <td>Birgunj</td>
                                                <td>Madhesh Province</td>
                                                <td>Nepal</td>
                                                <td>44300</td>
                                                <td>Custom</td>
                                                <td>Rs. 500</td>
                                                <td>General Checkup, ECG, Blood Test</td>
                                                <td>General Physician</td>
                                                <td>MBBS</td>
                                                <td>Tribhuvan University</td>
                                                <td>2015</td>
                                                <td>National Hospital</td>
                                                <td>2016</td>
                                                <td>2021</td>
                                                <td>Senior Consultant</td>
                                                <td>Best Doctor Award</td>
                                                <td>2020</td>
                                                <td>Nepal Medical Association</td>
                                                <td>NMC123456</td>
                                                <td>2016</td>
                                               <td>
														<div class="status-toggle">
															<input type="checkbox" id="status_1" class="check" checked>
															<label for="status_1" class="checktoggle">checkbox</label>
														</div>
													</td>
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>


										</table>
									</div>
								</div>
							</div>
@endsection