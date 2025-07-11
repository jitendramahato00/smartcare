<nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-primary fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#"><p>{{ $settings['sitename'] ?? 'MyWebsite'}}</p></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <!-- Menu Items -->
        <ul class="navbar-nav mx-auto d-flex align-items-center gap-2">
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

        <!-- Buttons -->
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-login">Login</a>
          <a href="#" class="btn btn-signup">Signup</a>
         <button class="btn btn-secure" data-bs-toggle="modal" data-bs-target="#loginModal">
  Upload Report
</button>

        </div>
      </div>
    </div>
  </nav>