@include('frontend.hospitals.includes.header')

<!-- Main Wrapper -->
<div class="main-wrapper">
    
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctor.profile',$hospital->id) }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    
    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{ $hospital->photo ? asset('storage/' . $hospital->photo) : asset('assets/img/doctors/doctor-thumb-02.jpg') }}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">Dr. {{ $hospital->first_name }} {{ $hospital->last_name }}</h4>
                                <p class="doc-speciality">{{ is_array($hospital->specialization) ? implode(', ', $hospital->specialization) : $hospital->specialization }}</p>
                                
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $hospital->city }}, {{ $hospital->country }}</p>
                                </div>
                                @if($hospital->services)
                                <div class="clinic-services">
                                    @php $services = is_array($hospital->services) ? $hospital->services : explode(',', $hospital->services); @endphp
                                    @foreach($services as $service)
                                        <span>{{ trim($service) }}</span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li><i class="far fa-thumbs-up"></i> 99%</li>
                                    <li><i class="far fa-comment"></i> 35 Feedback</li>
                                    <li><i class="fas fa-map-marker-alt"></i> {{ $hospital->city }}, {{ $hospital->country }}</li>
                                    @if($hospital->pricing_type == 'free')
                                        <li><i class="far fa-money-bill-alt"></i> Free Consultation</li>
                                    @elseif($hospital->custom_price)
                                        <li><i class="far fa-money-bill-alt"></i> ₹{{ $hospital->custom_price }}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{ route('book.appointments', $hospital->id) }}">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->
            
            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">
                
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                            </li>
                        </ul>
                    </nav>
                    
                    <div class="tab-content pt-0">
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-7 col-lg-8 col-xl-9">
                                
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Me</h4>
                                        <p>{{ $hospital->biography }}</p>
                                    </div>
                                    
                                    <div class="widget education-widget">
                                        <h4 class="widget-title">Education</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @if($hospital->degree)
                                                <li>
                                                    <div class="experience-user"><div class="before-circle"></div></div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="name">{{ $hospital->college }}</a>
                                                            <div>{{ $hospital->degree }}</div>
                                                            <span class="time">{{ $hospital->year_of_completion }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                @else
                                                <li>No education details provided.</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                            
                                    <div class="widget experience-widget">
                                        <h4 class="widget-title">Work & Experience</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @if($hospital->hospital_name)
                                                <li>
                                                    <div class="experience-user"><div class="before-circle"></div></div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="name">{{ $hospital->hospital_name }} - ({{ $hospital->designation }})</a>
                                                            <span class="time">{{ $hospital->experience_from }} - {{ $hospital->experience_to }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                @else
                                                <li>No experience details provided.</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                        
                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Awards</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @if($hospital->award)
                                                <li>
                                                    <div class="experience-user"><div class="before-circle"></div></div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <p class="exp-year">{{ $hospital->award_year }}</p>
                                                            <h4 class="exp-title">{{ $hospital->award }}</h4>
                                                        </div>
                                                    </div>
                                                </li>
                                                @else
                                                <li>No awards listed.</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>

                                <!-- ===== बदलाव: यह नया साइडबार सेक्शन जोड़ा गया है ===== -->
                                <div class="col-md-5 col-lg-4 col-xl-3">
                                    <div class="card-body">
                                        <div class="widget business-widget">
                                            <div class="widget-content">
                                                <div class="listing-hours">
                                                    <div class="listing-day current">
                                                        <div class="day">Today <span>{{ date('d M Y') }}</span></div>
                                                        <div class="time-items">
                                                            @if($hospital->duty_start_time && $hospital->duty_end_time)
                                                                <span class="time">{{ date('h:i A', strtotime($hospital->duty_start_time)) }} - {{ date('h:i A', strtotime($hospital->duty_end_time)) }}</span>
                                                            @else
                                                                <span class="badge bg-danger-light">Not Available Today</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- Aap yahan baaki dinon ke liye bhi static ya dynamic data daal sakte hain --}}
                                                    <div class="listing-day">
                                                        <div class="day">Monday - Friday</div>
                                                        <div class="time-items">
                                                             @if($hospital->duty_start_time && $hospital->duty_end_time)
                                                                <span class="time">{{ date('h:i A', strtotime($hospital->duty_start_time)) }} - {{ date('h:i A', strtotime($hospital->duty_end_time)) }}</span>
                                                            @else
                                                                <span class="badge bg-danger-light">Closed</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="listing-day">
                                                        <div class="day">Saturday - Sunday</div>
                                                        <div class="time-items">
                                                            <span class="badge bg-danger-light">Closed</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ==================================================== -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Details Tab -->

        </div>
    </div>      
    <!-- /Page Content -->
   
    @include('frontend.hospitals.includes.footer')
   
</div>
<!-- /Main Wrapper -->