<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CedarSouks</title>
  <link rel="stylesheet" href="{{asset('css/app2.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>
<body>
<form action="{{route('register-user')}}" method="post">
  @if(Session::has('success'))
  <div class="alert alert-success center-text" style="color: red;">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger center-text" style="color: red;">{{Session::get('fail')}}</div>
  @endif
  @csrf
  <h2>Sign Up page</h2>
  <div class="form-group fullname">
    <label for="fullname">Full Name</label>
    <input type="text" id="fullname" placeholder="Enter your full name" name="name">
    <span class="text-danger" style="color: red;">@error('name') {{$message}} @enderror</span>
  </div>
  <div class="form-group email">
    <label for="email">Email Address</label>
    <input type="text" id="email" placeholder="Enter your email address" name="email">
    <span class="text-danger" style="color: red;">@error('email') {{$message}} @enderror</span>
  </div>
  <div class="form-group password">
    <label for="password">Password</label>
    <input type="password" id="password" placeholder="Enter your password" name="password">
    <span class="text-danger" style="color: red;">@error('password') {{$message}} @enderror</span>
    <i id="pass-toggle-btn" class="fa-solid fa-eye" onclick="togglePasswordVisibility()"></i>
  </div>
  <div class="form-group date">
    <label for="date">Birth Date</label>
    <input type="date" id="date" placeholder="Select your date" name="date">
    <span class="text-danger" style="color: red;">@error('date') {{$message}} @enderror</span>
  </div>
  <div class="form-group gender">
    <label for="gender">Type</label>
    <select id="gender" name="type">
      <option value="" selected disabled>Select type of account</option>
      <option value="Buyer">Buyer</option>
      <option value="Seller">Seller</option>
    </select>
  </div>
  <div class="form-group submit-btn">
    <input type="submit" value="Submit">
  </div>

<div class="container">
<p>Already have an account? <a href="http://127.0.0.1:8000/login">Log in</a></p></div>
</form>

<script>
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var toggleBtn = document.getElementById("pass-toggle-btn");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleBtn.classList.remove("fa-eye");
    toggleBtn.classList.add("fa-eye-slash");
  } else {
    passwordInput.type = "password";
    toggleBtn.classList.remove("fa-eye-slash");
    toggleBtn.classList.add("fa-eye");
  }
}
</script>
</body>
</html>