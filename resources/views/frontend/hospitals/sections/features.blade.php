<!-- Availabe Features -->

@include('frontend.hospitals.includes.header')
<style>
    html {
  scroll-behavior: smooth;
}

</style>




<section class="section section-features py-5 bg-light" id="features"  style="scroll-margin-top: 80px;">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <div class="section-header mb-4">
                    <h2 class="mt-2">Available Features in Our Clinic</h2>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                </div>
            </div>
        </div>

        <!-- Slider -->
        <div class="features-slider  overflow-auto justify-content-start px-4">
            <!-- Feature Item -->
            <div class="feature-item text-center me-4 flex-shrink-0" style="width: 150px;">
                <img src="{{ asset('assets/img/features/feature-05.jpg') }}" class="img-fluid rounded-circle mb-2" alt="Feature">
                <p>Patient Ward</p>
            </div>

            <div class="feature-item text-center me-4 flex-shrink-0" style="width: 150px;">
                <img src="assets/img/features/feature-02.jpg" class="img-fluid rounded-circle mb-2" alt="Feature">
                <p>Test Room</p>
            </div>

            <div class="feature-item text-center me-4 flex-shrink-0" style="width: 150px;">
                <img src="assets/img/features/feature-03.jpg" class="img-fluid rounded-circle mb-2" alt="Feature">
                <p>ICU</p>
            </div>

            <div class="feature-item text-center me-4 flex-shrink-0" style="width: 150px;">
                <img src="assets/img/features/feature-04.jpg" class="img-fluid rounded-circle mb-2" alt="Feature">
                <p>Laboratory</p>
            </div>

            <div class="feature-item text-center me-4 flex-shrink-0" style="width: 150px;">
                <img src="assets/img/features/feature-05.jpg" class="img-fluid rounded-circle mb-2" alt="Feature">
                <p>Operation</p>
            </div>

            <div class="feature-item text-center me-4 flex-shrink-0" style="width: 150px;">
                <img src="assets/img/features/feature-06.jpg" class="img-fluid rounded-circle mb-2" alt="Feature">
                <p>Medical</p>
            </div>
        </div>
        <!-- /Slider -->
    </div>
</section>
<!-- /Availabe Features -->
