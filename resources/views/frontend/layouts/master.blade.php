<!DOCTYPE html> 
<html lang="en">
	
<!-- doccure/  30 Nov 2019 04:11:34 GMT -->
<head>

     <!-- Favicons -->
<link type="image/x-icon" href="{{ asset('frontend/img/favicon.png') }}" rel="icon">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/plugins/fontawesome/css/all.min.css') }}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
<header class="header">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Button Styles */
    .btn-login {
      background-color: #0d6efd;
      color: white;
      border-radius: 20px;
      padding: 8px 20px;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-signup {
      background-color: #28a745;
      color: white;
      border-radius: 20px;
      padding: 8px 20px;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-secure {
      background-color: #dc3545;
      color: white;
      border-radius: 20px;
      padding: 8px 20px;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Navbar Links */
    .navbar-nav .nav-link {
      font-size: 17px;
      font-weight: 500;
      color: #343a40 !important;
      padding: 10px 15px;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #0d6efd !important;
      text-decoration: underline;
    }

    /* Navbar Brand */
    .navbar-brand {
      font-size: 22px;
      font-weight: bold;
      color: #0d6efd !important;
    }

    /* Extra spacing in navbar */
    .navbar {
      padding-top: 12px;
      padding-bottom: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    /* Form Section */
    #secureForm {
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 25px;
      background-color: #f8f9fa;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
  </style>
   <!-- navbar -->
  @include('frontend.includes.navbar')
   <!-- /navbar -->
  
   <!-- hero section -->
 @yield('content')
	  
		<!-- jQuery -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

<!-- Slick JS -->
<script src="{{ asset('frontend/js/slick.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('frontend/js/script.js') }}"></script>

		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>