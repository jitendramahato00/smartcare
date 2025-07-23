<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doccure</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Custom Internal CSS (optional) -->
<style>
    /* ✅ Navbar with blue background */

   /* ✅ Navbar Background - Little Blue */
.custom-navbar {
    background-color: #3b5af3ff; /* Light Blue */
}

/* ✅ Navbar Brand */
.navbar-brand {
    color: #fff !important;
    font-size: 22px;
    font-weight: 700;
}

/* ✅ Navbar Links */
.navbar-nav .nav-link {
    color: #ffffff !important;
    font-size: 16px;
    font-weight: 500;
    transition: 0.3s ease;
    padding: 8px 12px;
}
.navbar-nav .nav-link:hover {
    color: #ffc107 !important;
    text-decoration: underline;
}






</style>


</head>
<body>

    <!-- Navbar Include -->
    @include('frontend.hospitals.includes.navbar')

    


    

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>


     <!-- Footer (Common in all pages) -->
  @include('frontend.hospitals.includes.footer')


   
    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    <!-- Bootstrap JS (required for modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

<script>
  function loginSecurely(event) {
    event.preventDefault(); // form reload na ho

    // ✅ Sirf directly show karna (bina validation ke)
    document.getElementById('uploadReports').style.display = 'block';
    document.getElementById('patientDashboard').style.display = 'block';

    // ✅ Modal close karna
    const modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
    modal.hide();

    // ✅ Input fields clear (optional)
    document.getElementById('mobile').value = '';
    document.getElementById('password').value = '';
  }
</script>

</html>
