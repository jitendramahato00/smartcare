
<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Securely</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form onsubmit="loginSecurely(event)"> <!-- ✅ Form starts here -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="mobile" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="mobile" placeholder="Enter number" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Login Securely</button>
        </div>
      </form> <!-- ✅ Form ends here -->

    </div>
  </div>
</div>



