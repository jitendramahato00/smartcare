<style>.modal-content {
  background: #fff;
  border-radius: 1rem;
  padding-top: 10px;
}

.modal-title {
  font-family: 'Poppins', sans-serif;
  letter-spacing: 0.5px;
}

.form-control {
  font-size: 16px;
  padding: 12px 20px;
}

.form-label {
  font-weight: 500;
  font-size: 15px;
  color: #333;
}

.btn-primary {
  background-color: #0d6efd;
  border: none;
}
.btn-primary:hover {
  background-color: #0b5ed7;
}

.btn-success {
  background-color: #198754;
  border: none;
}
.btn-success:hover {
  background-color: #157347;
}
</style>


<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0">
      
      <div class="modal-header border-0">
        <h5 class="modal-title w-100 text-center text-success fw-bold" id="signupLabel">Create a New Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form>
        <div class="modal-body px-4 pb-4">
          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control form-control-lg rounded-pill" placeholder="Enter your name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control form-control-lg rounded-pill" placeholder="Enter your email" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control form-control-lg rounded-pill" placeholder="Choose a password" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control form-control-lg rounded-pill" placeholder="Confirm password" required>
          </div>
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-success rounded-pill btn-lg">Signup</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
