<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style5.css') }}">
</head>

<body>
  <div class="add-store">
    <form method="POST" action="{{ route('store.storeProduct', $store->id) }}" enctype="multipart/form-data">
      @csrf <!-- Add this line to include the CSRF token field -->
      <h2>Add Products</h2>
      <div class="form-group store-name">
        <label for="store-name">Product Name</label>
        <input type="text" id="store-name" name="name" placeholder="Enter the product name">
      </div>
      <div class="form-group detail">
        <label for="detail">Product Description</label>
        <input type="text" id="detail" name="detail" placeholder="Enter the product details">
      </div>
      <div class="form-group price">
        <label for="price">Product Price</label>
        <input type="text" id="price" name="price" placeholder="Enter the product price">
      </div>
      <div class="form-group logo">
      <label for="logo">Logo</label>
      <input type="file" id="logo" name="myfile" required>
      </div>
      <div class="form-group">
        <label for="category">Category Choice</label>
        <select id="category" name="category" style="width: 595px; height: 50px">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group submit-btn">
        <input type="submit" value="Create">
      </div>
    </form>
  </div>
</body>

</html>