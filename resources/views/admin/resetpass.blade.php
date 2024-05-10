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
<form action="{{ route('changepass', ['id' => $id]) }}" method="post">
 @csrf
   <h2>Change Password</h2>
   <div class="form-group password">
    <label for="password">Password</label>
    <input type="password" id="password" placeholder="Enter your password" name="password">
    <i id="pass-toggle-btn" class="fa-solid fa-eye" onclick="togglePasswordVisibility()"></i>
  </div>
  <div class="form-group submit-btn">
    <input type="submit" value="Submit">
  </div>
</form>

<script>
function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var toggleButton = document.getElementById("pass-toggle-btn");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.classList.remove("fa-eye");
        toggleButton.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        toggleButton.classList.remove("fa-eye-slash");
        toggleButton.classList.add("fa-eye");
    }
}
</script>
</body>
</html>