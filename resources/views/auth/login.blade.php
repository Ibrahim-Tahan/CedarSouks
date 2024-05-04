<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="{{route('login-user')}}" method="post">
      @if(Session::has('success'))
    <div class="alert alert-success" style="color: blue; margin-top: 30px; text-align: center; font-size: 18px;">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger" style="color: blue; margin-top: 30px; text-align: center; font-size: 18px;">
        {{Session::get('fail')}}
    </div>
@endif


        @csrf
        <div class="txt_field">
          <input type="text" required name="email">
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="text" required name="password">
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="http://127.0.0.1:8000/registration">Signup</a>
        </div>
        <a class="login-button" href="/sign-in/google">
        Login with Google
        </a>
       <a class="login-button facebook" href="/sign-in/github">
       Sign In with Github
       </a>
      </form>
    </div>

  </body>
</html>