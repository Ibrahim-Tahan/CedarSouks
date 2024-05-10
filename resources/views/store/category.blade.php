<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style4.css') }}">
  <title>CedarSouks</title>
</head>

<body>
  <div class="add-store">
    <form method="POST" action="{{ route('store.storeCategory', $store->id) }}">
      @csrf
      <h2>Add Categories</h2>
      <div class="form-group store-name">
        <label for="store-name">Category Name</label>
        <input type="text" id="store-name" name="name" placeholder="Enter the category name" required>
        @if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
        @endif
      </div>
      <div class="form-group detail">
        <label for="detail">Category Description</label>
        <input type="text" id="detail" name="description" placeholder="Enter the category description" required>
        @if($errors->has('description'))
        <div class="error">{{ $errors->first('description') }}</div>
        @endif
      </div>
      <div class="form-group submit-btn">
        <input type="submit" value="Create">
      </div>
    </form>
  </div>
</body>

</html>