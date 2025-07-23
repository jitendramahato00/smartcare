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
                                <!-- Dynamic Image -->
                                <img src="{{ $hospital->photo ? asset('storage/' . $hospital->photo) : asset('assets/img/doctors/doctor-thumb-02.jpg') }}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <!-- Dynamic Name -->
                                <h4 class="doc-name">Dr. {{ $hospital->first_name }} {{ $hospital->last_name }}</h4>
                                <!-- Dynamic Specialization -->
                                <p class="doc-speciality">{{ $hospital->specialization }}</p>
                                
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(35)</span>
                                </div>
                                <div class="clinic-details">
                                    <!-- Dynamic Location -->
                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $hospital->city }}, {{ $hospital->country }}</p>
                                </div>
                                @if($hospital->services)
                                <div class="clinic-services">
                                    {{-- Services ko comma se alag karke dikhayein --}}
                                    @php $services = explode(',', $hospital->services); @endphp
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
                                    <!-- Dynamic Price -->
                                    @if($hospital->pricing_type == 'free')
                                        <li><i class="far fa-money-bill-alt"></i> Free Consultation</li>
                                    @elseif($hospital->custom_price)
                                        <li><i class="far fa-money-bill-alt"></i> ${{ $hospital->custom_price }} per hour</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="#">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->
            
            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">
                
                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                            </li>
                            {{-- Add more tabs if needed --}}
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->
                    
                    <!-- Tab Content -->
                    <div class="tab-content pt-0">
                    
                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">
                                
                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Me</h4>
                                        <!-- Dynamic Biography -->
                                        <p>{{ $hospital->biography }}</p>
                                    </div>
                                    <!-- /About Details -->
                                
                                    <!-- Education Details -->
                                   <!-- Education Details -->
                                    <div class="widget education-widget">
                                        <h4 class="widget-title">Education</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                {{-- Check karein ki degree column mein data hai ya nahi --}}
                                                @if($hospital->degree)
                                                <li>
                                                    <div class="experience-user"><div class="before-circle"></div></div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            {{-- Ab data seedhe column se aayega --}}
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
                                    <!-- /Education Details -->
                                    <!-- /Education Details -->
                            
                                    <!-- Experience Details -->
                                    <!-- Experience Details -->
                                        <div class="widget experience-widget">
                                            <h4 class="widget-title">Work & Experience</h4>
                                            <div class="experience-box">
                                                <ul class="experience-list">
                                                    {{-- Check karein ki hospital_name column mein data hai ya nahi --}}
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
                                        <!-- /Experience Details -->
                                    <!-- /Experience Details -->
                        
                                    <!-- Awards Details -->
                                    <!-- Awards Details -->
                                    <div class="widget awards-widget">
                                        <h4 class="widget-title">Awards</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                {{-- Check karein ki award column mein data hai ya nahi --}}
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
                                    <!-- /Awards Details -->
                                    <!-- /Awards Details -->
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->
                        
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