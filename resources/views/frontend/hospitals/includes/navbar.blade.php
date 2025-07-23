<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">
      <p class="mb-0 text-white fw-bold">{{ $settings['sitename'] ?? 'MyWebsite' }}</p>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav mx-auto d-flex align-items-center gap-3">
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="#doctors">Doctors</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="#features">Features</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="#">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-white fw-semibold" href="#specialities">Speciality</a></li>
      </ul>
    </div>
  </div>
</nav>
