<footer class="bg-primary text-white pt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold">About Us</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <div>
          <a href="{{ $settings['facebook'] }}" target="_blank" class="text-white me-3">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="{{ $settings['twitter'] }}" target="_blank" class="text-white me-3">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="{{ $settings['linkedin'] }}" target="_blank" class="text-white me-3">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="{{ $settings['instagram'] }}" target="_blank" class="text-white">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold">For Patients</h5>
        <ul class="list-unstyled">
          <li><a href="search.html" class="text-white text-decoration-none">Search for Doctors</a></li>
          <li><a href="login.html" class="text-white text-decoration-none">Login</a></li>
          <li><a href="register.html" class="text-white text-decoration-none">Register</a></li>
          <li><a href="booking.html" class="text-white text-decoration-none">Booking</a></li>
          <li><a href="patient-dashboard.html" class="text-white text-decoration-none">Patient Dashboard</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold">For Doctors</h5>
        <ul class="list-unstyled">
          <li><a href="appointments.html" class="text-white text-decoration-none">Appointments</a></li>
          <li><a href="chat.html" class="text-white text-decoration-none">Chat</a></li>
          <li><a href="login.html" class="text-white text-decoration-none">Login</a></li>
          <li><a href="doctor-register.html" class="text-white text-decoration-none">Register</a></li>
          <li><a href="doctor-dashboard.html" class="text-white text-decoration-none">Doctor Dashboard</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="fw-bold">Contact Us</h5>
        <address>
          <p><i class="fas fa-map-marker-alt me-2"></i>{{ $settings['address'] ?? '3556 Beech Street, San Francisco, CA' }}</p>
          <p><i class="fas fa-phone-alt me-2"></i>{{ $settings['phone'] ?? '+1 315 369 5943' }}</p>
          <p><i class="fas fa-envelope me-2"></i>{{ $settings['email'] ?? 'info@yourmail.com' }}</p>
        </address>
      </div>
    </div>
  </div>

  <div class="bg-dark text-center text-white py-3">
    <div class="container d-flex justify-content-between flex-wrap">
      <small>© 2025 Your Company. All rights reserved.</small>
      <ul class="list-inline mb-0">
        <li class="list-inline-item"><a href="term-condition.html" class="text-white text-decoration-none">Terms and Conditions</a></li>
        <li class="list-inline-item"><a href="privacy-policy.html" class="text-white text-decoration-none">Privacy Policy</a></li>
      </ul>
    </div>
  </div>
</footer>
