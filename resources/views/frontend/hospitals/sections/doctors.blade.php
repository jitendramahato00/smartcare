{{-- resources/views/welcome.blade.php --}}

<style>
    html {
        scroll-behavior: smooth;
    }
    .card-img-top {
        width: 100%;
        height: 250px; /* Ek fixed height dein */
        object-fit: cover; /* Image ko crop karke fit karega */
    }
</style>

<section class="section section-doctor py-5 bg-light" id="doctors" style="scroll-margin-top: 80px;">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="text-primary">Book Our Doctor</h2>
        </div>

        <div class="row justify-content-center">

            @forelse($hospitals as $hospital)
            <!-- Doctor Widget Start -->
            <div class="col-md-6 col-lg-4 mb-4 d-flex">
                <div class="card shadow-sm h-100 w-100">
                    <div class="position-relative">
                        <img src="{{ $hospital->photo ? asset('storage/' . $hospital->photo) : asset('assets/img/doctors/doctor-thumb-01.jpg') }}" class="card-img-top" alt="Dr. {{ $hospital->first_name }} {{ $hospital->last_name }}">
                        <a href="#" class="position-absolute top-0 end-0 m-2 text-danger"><i class="far fa-bookmark"></i></a>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1">Dr. {{ $hospital->first_name }} {{ $hospital->last_name }} <i class="fas fa-check-circle text-success"></i></h5>
                        
                        @if($hospital->specialization)
                            {{-- Specialization ko array se string mein convert karke dikhayein --}}
                            <p class="text-muted small">{{ is_array($hospital->specialization) ? implode(', ', $hospital->specialization) : $hospital->specialization }}</p>
                        @endif

                        <div class="mb-2">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                            <span class="small text-muted">(25)</span>
                        </div>
                        <ul class="list-unstyled small text-muted mb-3 mt-auto">
                            @if($hospital->city && $hospital->country)
                                <li><i class="fas fa-map-marker-alt me-1"></i> {{ $hospital->city }}, {{ $hospital->country }}</li>
                            @endif
                            
                            <!-- ===== बदलाव: यहाँ पर डायनामिक ड्यूटी टाइम जोड़ा गया है ===== -->
                            {{-- यह तभी दिखेगा जब एडमिन ने स्टार्ट और एंड टाइम दोनों सेट किए हों --}}
                            @if($hospital->duty_start_time && $hospital->duty_end_time)
                                <li>
                                    <i class="far fa-clock me-1"></i> 
                                    Duty: {{ date('h:i A', strtotime($hospital->duty_start_time)) }} - {{ date('h:i A', strtotime($hospital->duty_end_time)) }}
                                </li>
                            @endif
                            <!-- ========================================================== -->
                            
                            @if($hospital->pricing_type == 'free')
                                <li><i class="far fa-money-bill-alt me-1"></i> Free Consultation</li>
                            @elseif($hospital->custom_price)
                                {{-- भारतीय रुपये का चिह्न जोड़ा गया है --}}
                                <li><i class="far fa-money-bill-alt me-1"></i> ₹{{ $hospital->custom_price }}</li>
                            @endif
                        </ul>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('doctor.profile', $hospital->id) }}" class="btn btn-outline-primary btn-sm">View Profile</a>
                            <a href="{{ route('book.appointments', $hospital->id) }}" class="btn btn-primary btn-sm">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Doctor Widget End -->

            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No doctors available at the moment.</p>
            </div>
            @endforelse

        </div>
    </div>
</section>