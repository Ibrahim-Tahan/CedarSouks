<html>
  <head>
    <title>Box for balad</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bootstrap 5 footer design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}" />
    <style type="text/css">
      body {
        background-color: #a2ded0;
      }
      .box1 {
        background-color: #009879;
        width: 25%;
        height: 550px;
        float: left;
        margin-top: 5%;
      }
      input[type="button"] {
    margin-left: 25%;
    width: 50%;
    height: 8%;
    background-color: grey;
    color: black;
    border: 1px solid grey;
    border-radius: 5px;
    font-family: 'Montserrat', sans-serif;
  }

  input[type="button"]:hover {
    background-color:#fe1e4f;;
    color: white;
    border-color:#fe1e4f;
  }
  table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid black;
			text-align: left;
			padding: 8px;
		}





  </style>
  <body>
    <nav>
      <div class="logo">
        <p>{{$store->name}}</p>
      </div>
      <ul>
        <li><a  href="{{ route('home') }}">Home</a></li>
        <li><a  href="{{ route('store.addCategory', $store->id) }}" >Add Categories</a></li>
        <li><a href="{{ route('store.addProduct', ['storeId' => $store->id]) }}">Add Product</a></li>
      </ul>
    </nav>
    <div class="content-items">
      <br><br><br><br><h1 style="color:white; font-size: 82px;text-align:center;font-weight:bold">{{$store->name}}</h1><br>
      <h3 style="text-align:center;color:#009879;">{{$store->address}}</h3><br>
      <h3 style="text-align:center;color:white;font-weight:bold">
        {{$store->description}}
      </h3>
    </div>
    <h2 style="color:white; font-size: 90px; text-align:center; font-weight:bold;margin-top:-200px;">Categories</h2>
    @if($store->getCategories)
    @foreach ($store->getCategories as $category)
    <p style="margin-left:100px;font-size:58px;font-family:'Montserrat','Helvetica Neue',Arial,sans-serif;color:white;margin-top:60px;line-height:1.2;text-shadow:0 2px 4px rgba(0,0,0,0.5);">{{ $category->name }}</p>
    <div class="container">
      @if ($category->getProducts)
      @foreach ($category->getProducts as $product)
      <div class="box1">
        <img src="{{ asset($product->path) }}" alt="Image belong here">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p class="price">Price: ${{ $product->price }}</p>
        <form action="{{ route('delete2', ['id' => $product->id, 'store_id' => $store->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="delete-button">Delete</button>
        </form>
      </div>
      @endforeach
      @endif
    </div>
    @endforeach
    @endif
    <h2 style="color:white; font-size: 152px;text-align:center;font-weight:bold;margin-top:100px;margin-bottom:100px;width:100%;">{{$store->name}}</h1>
    <div class="content-items2">
  <!-- Your content goes here -->
</div>


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <img src="img/logo.png" alt="">
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam repellendus sunt praesentium aspernatur iure molestias.</p>
              <h3>We Accect</h3>
              <div class="card-area">
                <i class="fa fa-cc-visa"></i>
                <i class="fa fa-credit-card"></i>
                <i class="fa fa-cc-mastercard"></i>
                <i class="fa fa-cc-paypal"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>Hosting</h2>
              <ul>
                <li><a href="#">Web Hosting</a></li>
                <li><a href="#">Cloud Hosting</a></li>
                <li><a href="#">CMS Hosting</a></li>
                <li><a href="#">WordPress Hosting</a></li>
                <li><a href="#">Email Hosting</a></li>
                <li><a href="#">VPS Hosting</a></li>
              </ul>
            </div>                    
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>Domain</h2>
              <ul>
                <li><a href="#">Web Domain</a></li>
                <li><a href="#">Cloud Domain</a></li>
                <li><a href="#">CMS Domain</a></li>
                <li><a href="#">WordPress Domain</a></li>
                <li><a href="#">Email Domain</a></li>
                <li><a href="#">VPS Domain</a></li>
              </ul>
            </div>                    
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="single-box">
              <h2>Newsletter</h2>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloremque earum similique fugiat nobis. Facere?</p>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Enter your Email ..." aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-long-arrow-right"></i></span>
              </div>
              <h2>Follow us on</h2>
              <p class="socials">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-dribbble"></i>
                <i class="fa fa-pinterest"></i>
                <i class="fa fa-twitter"></i>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js">
  </body>
</html>