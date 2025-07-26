{{dd($token)}}

<form method="POST" action="{{ route('login') }}" encoding="">
    @csrf
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ConfirmPassword</label>
    <input type="password" name=""class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" class="btn btn-primary">Login</button>
</form>