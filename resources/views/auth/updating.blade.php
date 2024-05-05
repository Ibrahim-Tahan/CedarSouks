<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Info</title>
    <link rel="stylesheet" href="{{ asset('css/app3.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>
<body>
<form action="{{ route('changing-user', ['userId' => $data->id]) }}" method="post">
@if(Session::has('success'))
  <div class="alert alert-success center-text" style="color: red;">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-danger center-text" style="color: red;">{{Session::get('fail')}}</div>
  @endif
    @csrf
    <h2>Update Info</h2>
    <div class="form-group fullname">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="name" placeholder="Update your full name" value="{{ $data->fullname }}">
    </div>
    <div class="form-group email">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Update your email address" value="{{ $data->email }}">
    </div>
    <div class="form-group password">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Update your password">
        <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
   </div>
    <div class="form-group date">
        <label for="date">Birth Date</label>
        <input type="date" id="date" name="date" placeholder="Select your date" value="{{ $data->birth_date }}">
    </div>
    <div class="form-group submit-btn">
        <input type="submit" value="Update">
    </div>
</form>

<script>
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('pass-toggle-btn');

    toggleBtn.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleBtn.classList.remove('fa-eye');
            toggleBtn.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleBtn.classList.remove('fa-eye-slash');
            toggleBtn.classList.add('fa-eye');
        }
    });
</script>
</body>
</html>