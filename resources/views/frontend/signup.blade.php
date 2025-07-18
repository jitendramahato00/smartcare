<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Modal</title>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f9f9f9;
    }

    .modal-content {
      background: #fff;
      border-radius: 1rem;
      padding: 20px 25px;
      max-width: 420px;
      margin: auto;
      min-height: 500px; 
    }

    .modal-title {
      font-weight: bold;
      font-size: 22px;
      color: #28a745;
    }

    .form-label {
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 6px;
    }

    .form-control {
      font-size: 14px;
      padding: 10px 18px;
      border-radius: 50px;
    }

    .btn-success {
      background-color: #198754;
      border: none;
      padding: 10px;
      font-size: 15px;
      font-weight: 500;
      border-radius: 50px;
    }

    .btn-success:hover {
      background-color: #157347;
    }

    .error-box {
      background-color: #f8d7da;
      color: #842029;
      font-size: 13px;
      border-radius: 8px;
      padding: 10px 15px;
      margin-bottom: 15px;
      max-height: 100px;
      overflow-y: auto;
    }

    .error-box ul {
      margin: 0;
      padding-left: 20px;
    }

    .modal-header {
      border-bottom: none;
      justify-content: center;
      padding-bottom: 0;
    }

    .btn-close {
      position: absolute;
      top: 15px;
      right: 15px;
    }

    .modal-body {
      padding-top: 10px;
    }
  </style>
</head>
<body>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-sm">

      <div class="modal-header">
        <h5 class="modal-title text-center w-100" id="signupLabel">Create a New Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <!-- Laravel Validation Errors -->
        @if ($errors->any() && old('_form') == 'signup')
          <div class="error-box">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('signup.submit') }}" method="POST">
          @csrf
          <input type="hidden" name="_form" value="signup">

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="form-control" placeholder="Enter your name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="form-control" placeholder="Enter your email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                   class="form-control" placeholder="Choose a password" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation"
                   class="form-control" placeholder="Confirm password" required>
          </div>

          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-success">Signup</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Laravel Error Modal Auto Open -->
@if ($errors->any() && old('_form') == 'signup')
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const modal = new bootstrap.Modal(document.getElementById('signupModal'));
    modal.show();
  });
</script>
@endif

</body>
</html>
