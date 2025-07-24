<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Login Form</title>
    <!--
        IMPORTANT: Place these links in your main HTML file's <head> section
        if you don't already have them. If you do, you can skip these.
    -->
      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!--
        CUSTOM CSS FOR THE LOGIN MODAL:
        Place this <style> block in your main HTML file's <head> section,
        or copy the CSS rules into your existing style.css file.
    -->
    <style>
        /* General body styling for demonstration (can be removed if your body is already styled) */
        
        .login-modal-content {
            border-radius: 1.5rem; /* More rounded corners */
            background-color: #ffffff; /* White background for the modal content */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); /* Stronger shadow */
            padding: 1.5rem; /* Reduced internal padding */
            max-width: 400px; /* Slightly narrower max width */
            width: 100%; /* Ensure it's responsive */
        }

        .login-title {
            color: #4B0082; /* Darker purple for the title */
            font-weight: 700; /* Bold title */
            font-size: 2rem; /* Slightly smaller title */
            margin-bottom: 0.25rem; /* Reduced space below title */
        }

        .text-muted {
            color: #6c757d !important; /* Ensure muted text is visible */
            font-size: 0.9rem; /* Smaller descriptive text */
        }

        .input-group-text.custom-input-group-text {
            background-color: #8A2BE2; /* Purple background for the icon */
            border: 1px solid #8A2BE2; /* Matching border color */
            color: #ffffff; /* White icon */
            border-top-left-radius: 0.75rem; /* Rounded corners for the icon part */
            border-bottom-left-radius: 0.75rem;
            padding: 0.6rem 0.9rem; /* Reduced padding for icon */
        }

        .form-control.custom-input {
            border-top-right-radius: 0.75rem !important; /* Rounded corners for the input field */
            border-bottom-right-radius: 0.75rem !important;
            border: 1px solid #ced4da; /* Default border color */
            padding: 0.6rem 0.9rem; /* Reduced padding for input */
            font-size: 0.95rem; /* Slightly smaller font size */
        }

        .form-control.custom-input:focus {
            border-color: #8A2BE2; /* Purple border on focus */
            box-shadow: 0 0 0 0.25rem rgba(138, 43, 226, 0.25); /* Light purple shadow on focus */
        }

        .login-btn {
            background-color: #8A2BE2; /* Purple background for the button */
            border-color: #8A2BE2; /* Matching border color */
            color: #ffffff; /* White text */
            font-weight: 600; /* Semi-bold text */
            padding: 0.7rem 1.2rem; /* Reduced padding */
            font-size: 1rem; /* Slightly smaller font size */
            border-radius: 2rem; /* Fully rounded button */
            transition: all 0.3s ease; /* Smooth transition for hover effects */
            box-shadow: 0 5px 15px rgba(138, 43, 226, 0.4); /* Button shadow */
        }

        .login-btn:hover {
            background-color: #4B0082; /* Darker purple on hover */
            border-color: #4B0082;
            transform: translateY(-2px); /* Slight lift effect */
            box-shadow: 0 8px 20px rgba(138, 43, 226, 0.6); /* Enhanced shadow on hover */
        }

        .forgot-password-link,
        .register-link {
            color: #8A2BE2; /* Purple links */
            font-weight: 600;
            font-size: 0.9rem; /* Smaller link text */
            transition: color 0.3s ease;
        }

        .forgot-password-link:hover,
        .register-link:hover {
            color: #4B0082; /* Darker purple on hover */
        }

        .form-check-input {
            margin-top: 0.25em; /* Adjust alignment for checkbox */
        }

        .form-check-input:checked {
            background-color: #8A2BE2;
            border-color: #8A2BE2;
        }

        /* Custom alert styling for client-side validation */
        .client-validation-errors {
            color: #dc3545; /* Red text for errors */
            font-size: 0.8rem; /* Smaller error text */
            margin-top: 0.4rem;
            margin-bottom: 0.8rem;
            padding: 0 1rem; /* Align with form padding */
        }
        .client-validation-errors ul {
            list-style-type: none; /* Remove bullet points */
            padding-left: 0;
            margin-bottom: 0;
        }
        .client-validation-errors li {
            margin-bottom: 0.2rem;
        }

        /* Adjust modal dialog for better centering */
        .modal-dialog {
            margin: auto;
        }
    </style>
</head>
<body>

<!--
    LOGIN MODAL HTML STRUCTURE:
    Place this entire <div> block anywhere within the <body> of your main HTML file.
    It's usually placed near the end of the <body> for better performance.
-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg border-0 login-modal-content">

            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title w-100 text-center fw-bold login-title" id="loginLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="text-center text-muted mb-3">
                Please login to your account to continue.
            </div>

            <!-- Client-side validation errors will be displayed here -->
            <div id="validationErrors" class="client-validation-errors">
                <ul></ul>
            </div>

       <form id="loginForm" method="POST" action="{{ route('login.submit') }}" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="modal-body px-4 pb-4">

        {{-- Server side validation error messages --}}
        @if(session('login_error'))
            <div class="alert alert-danger">
                {{ session('login_error') }}
            </div>
        @endif

        {{-- Validation errors from $request->validate --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="loginEmail" class="form-label visually-hidden">Email Address</label>
            <div class="input-group">
                <span class="input-group-text custom-input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="email" class="form-control custom-input" id="loginEmail" name="email" placeholder="Email" required value="{{ old('email') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="loginPassword" class="form-label visually-hidden">Password</label>
            <div class="input-group">
                <span class="input-group-text custom-input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control custom-input" id="loginPassword" name="password" placeholder="Password" required>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                <label class="form-check-label text-muted" for="rememberMe">
                    Remember me
                </label>
            </div>
            <a href="" class="text-decoration-none forgot-password-link">Forgot password?</a>
        </div>

        <div class="d-grid mt-4">
            <button type="submit"  id='loginBtn' class="btn login-btn">Login</button>
        </div>

        <div class="text-center mt-4 text-muted">
            Don't have an account? <a href='{{route("signup.form") }}' id="openSignupFromLogin"  class="register-link">Register</a>

        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 
<script>
 @if(url()->current() == route('login'))
    // Show the login modal when the page loads if the current URL is the login route
    $(document).ready(function() {
        $('#loginModal').modal('show');
    });

  
@endif  

$('#loginBtn').addEventListener('click', function() {
    // Initialize Bootstrap modal
    $('#loginModal').modal('show'); 

    // Show the modal when the page loads
    // loginModal.show();
    });

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const emailInput = document.getElementById('loginEmail');
    const passwordInput = document.getElementById('loginPassword');
    const errorContainer = document.getElementById('validationErrors').querySelector('ul');

    errorContainer.innerHTML = '';

    let errors = [];

    if (!emailInput.value.trim()) {
        errors.push('Email is required.');
    } else {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value.trim())) {
            errors.push('Please enter a valid email address.');
        }
    }

    if (!passwordInput.value.trim()) {
        errors.push('Password is required.');
    } else if (passwordInput.value.trim().length < 8) {
        errors.push('Password must be at least 8 characters long.');
    }

    if (errors.length > 0) {
        errors.forEach(function(error) {
            const li = document.createElement('li');
            li.textContent = error;
            errorContainer.appendChild(li);
        });
    } else {
        this.submit();
    }
});


</script>


</body>
</html>
