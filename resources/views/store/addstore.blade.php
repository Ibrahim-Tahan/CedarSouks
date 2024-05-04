<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style1.css') }}">
</head>

<body>
  <div class="add-store">
  <form action="{{ route('store', ['id' => $data]) }}" method="post" enctype="multipart/form-data">
    @csrf
      <h2>Create your store</h2>
      <div class="form-group store-name">
        <label for="store-name">Store Name</label>
        <input type="text" id="store-name" name="storename" placeholder="Enter the store name" required>
      </div>
      <div class="form-group detail">
        <label for="detail">Detail</label>
        <input type="text" id="detail" name="detail" placeholder="Enter the store details" minlength="1" required>
      </div>
      <div class="form-group logo">
     <label for="logo">Logo</label>
     <input type="file" id="logo" name="myfile" required>
     </div>
      <div class="form-group address">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter the store address" required>
      </div>
      <div class="form-group submit-btn">
        <input type="submit" value="Create">
      </div>
    </form>
  </div>
</body>

</html>