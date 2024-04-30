<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up page</title>
  <link rel="stylesheet" href="{{asset('css/app2.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>
<body>
<form action="{{ route('typeuser', ['id' => $user->id]) }}" method="post">
  @csrf
   <h2>Type page</h2>
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
</form>

<script src="script.js"></script>
</body>
</html>