<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0">
      
      <div class="modal-header border-0">
        <h5 class="modal-title w-100 text-center text-primary fw-bold" id="loginLabel">Login to Your Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

      <form onsubmit="loginSecurely(event)" method="POST" action="{{ route('login.submit') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body px-4 pb-4">
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control form-control-lg rounded-pill" id="loginEmail" placeholder="Enter your email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg rounded-pill" id="loginPassword" placeholder="Enter password" required>
          </div>
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary rounded-pill btn-lg">Login Securely</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
