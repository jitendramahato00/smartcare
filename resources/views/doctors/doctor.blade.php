@extends('doctors.layouts.master')
@section('title','Doctor-Dashboard')

@section('content')

 

            <!-- Noatation of appointment -->
            <div class="header-section">
                <div class="header-card">
                    <div class="icon text-primary"><i class="fas fa-procedures"></i></div>
                    <h3>Total Patient</h3>
                    <p>1500 <br> Till Today</p>
                </div>
                <div class="header-card">
                    <div class="icon text-success"><i class="fas fa-user-injured"></i></div>
                    <h3>Today Patient</h3>
                    <p>160 <br> 08, Nov 2019</p>
                </div>
                <div class="header-card">
                    <div class="icon text-info"><i class="fas fa-calendar-check"></i></div>
                    <h3>Appointments</h3>
                    <p>85 <br> 08, Apr 2019</p>
                </div>
            </div>

            <!-- Patient Appointment Section -->
            <div class="patient-appointment-section">
                <h4 class="mb-4">Patient Appointment</h4>
                <ul class="nav nav-tabs mb-3" id="appointmentTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="true">Upcoming</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab" aria-controls="today" aria-selected="false">Today</button>
                    </li>
                </ul>
                <div class="tab-content" id="appointmentTabsContent">
                    <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Appt. Date</th>
                                        <th>Purpose</th>
                                        <th>Type</th>
                                        <th>Paid Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://placehold.co/40x40/FF5733/FFFFFF?text=R" alt="Richard Wilson">
                                                <span>Richard Wilson <br><small class="text-muted">APT0010</small></span>
                                            </div>
                                        </td>
                                        <td>11 Nov 2019 <br><small class="text-primary">10.00 AM</small></td>
                                        <td>General</td>
                                        <td>New Patient</td>
                                        <td>$150</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i> View</button>
                                            <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-check"></i> Accept</button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://placehold.co/40x40/33FF57/FFFFFF?text=C" alt="Charlene Reed">
                                                <span>Charlene Reed <br><small class="text-muted">APT0001</small></span>
                                            </div>
                                        </td>
                                        <td>3 Nov 2019 <br><small class="text-primary">11.00 AM</small></td>
                                        <td>General</td>
                                        <td>Old Patient</td>
                                        <td>$200</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i> View</button>
                                            <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-check"></i> Accept</button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://placehold.co/40x40/3357FF/FFFFFF?text=T" alt="Travis Trimble">
                                                <span>Travis Trimble <br><small class="text-muted">APT0002</small></span>
                                            </div>
                                        </td>
                                        <td>1 Nov 2019 <br><small class="text-primary">1.00 PM</small></td>
                                        <td>General</td>
                                        <td>New Patient</td>
                                        <td>$75</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i> View</button>
                                            <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-check"></i> Accept</button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://placehold.co/40x40/FF33FF/FFFFFF?text=C" alt="Carl Kelly">
                                                <span>Carl Kelly <br><small class="text-muted">APT0003</small></span>
                                            </div>
                                        </td>
                                        <td>30 Oct 2019 <br><small class="text-primary">9.00 AM</small></td>
                                        <td>General</td>
                                        <td>New Patient</td>
                                        <td>$120</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-eye"></i> View</button>
                                            <button class="btn btn-sm btn-outline-success me-1"><i class="fas fa-check"></i> Accept</button>
                                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i> Cancel</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="today" role="tabpanel" aria-labelledby="today-tab">
                        <p>No appointments for today.</p>
                        <!-- Content for Today's appointments can go here -->
                    </div>
                </div>
            </div>
        </div>@endsection