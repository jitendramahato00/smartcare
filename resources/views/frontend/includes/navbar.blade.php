<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#"><p class="mb-0">{{ $settings['sitename'] ?? 'MyWebsite' }}</p></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav mx-auto d-flex align-items-center gap-3">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Hospitals</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item extra-menu" id="uploadReports" style="display: none;">
          <a class="nav-link" href="#">📤 Upload Reports</a>
        </li>
        <li class="nav-item extra-menu" id="patientDashboard" style="display: none;">
          <a class="nav-link" href="#">📋 Patient Dashboard</a>
        </li>
      </ul>

      <!-- ✅ Buttons with better spacing -->
      <div class="d-flex align-items-center gap-3">
       <!-- Navbar Buttons -->
    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>

       <button class="btn btn-secure" data-bs-toggle="modal" data-bs-target="#reportModal">
  Upload Report
</button>

      </div>
    </div>
  </div>
</nav>
