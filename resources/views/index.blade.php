@extends('layouts.master')
@section('title')
<title>Exotic world</title>
@endsection
@section('content')
<body>
    <nav id="nav">
        <div class="navTop">
            <div class="navItem">
                <img src="./img/sneakers.png" alt="">
            </div>
    
            <div class="navItem">
                <div class="search">
                <form id="searchForm" action="{{ route('search', ['id' => $store->id]) }}" method="GET">
    <input type="text" placeholder="Search..." class="searchInput" name="searchInput">
    <button type="submit" id="search-toggle" class="search-toggle">
        <i class="fas fa-search"></i>
    </button>
</form>

    </button>
                </div>
            </div>
            <div class="navItem">
                <span class="limitedOffer">Limited Offer!</span>
                
<form action="{{route('cartView')}}"  method="get">
<div class="cart-button">
<button type="submit">
    <i class="fas fa-shopping-cart"></i>
</button>
</div>
</form>
<span id="cart-count">0</span>

<div>
    <form action="{{route('addToWishlist')}}"  method="get">
        @csrf
  <button class="wishlist-icon" type="submit" title="Add to Favorites">
    <i class="fas fa-star"></i>
    <a href="{{route('addToWishlist')}}">Wishlist</a>
</button>
</form>
</div>
<div>
<form action="{{ route('messages', ['id' => Session::get('loginId')]) }}" method="get">
        <button type="submit">Live chat</button>
</form>
</div>
            </div>
        </div>
        <div class="navBottom">
    @foreach($categories as $category)
        <h3 class="menuItem" data-category="{{ $category->id }}">{{ $category->name }}</h3>
    @endforeach
</div>

</nav>
    <div class="slider">
        <div class="sliderWrapper">
            <div class="sliderItem">
               
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">Prime meta moon</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">5$</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/jordan.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">Wasabi chips</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">$1</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/blazer.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">Chips</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">5</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/crater.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">Drinks</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">2$</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem">
                <img src="./img/hippie.png" alt="" class="sliderImg">
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">Mystery Box</br> NEW</br> SEASON</h1>
                <h2 class="sliderPrice">20$</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
        </div>
    </div>
   
    <div class="features">
        <div class="feature">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDesc">Free worldwide shipping on all orders.</span>
        </div>
        <div class="feature">
            <span class="featureTitle">30 DAYS RETURN</span>
            <span class="featureDesc">No question return and easy refund in 14 days.</span>
        </div>
        <div class="feature">
            <span class="featureTitle">GIFT CARDS</span>
            <span class="featureDesc">Buy gift cards and use coupon codes easily.</span>
        </div>
        <div class="feature">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDesc">Keep in touch via email and support system.</span>
        </div>

    </div>
    @foreach ($productsByCategory as $categoryId => $products)
    <div class="product-list" data-category="{{ $categoryId }}">
        @if ($products)
            @foreach ($products as $product)
                <div class="product-item">
                    <h4 class="product-title">{{ $product->name }}</h4>
                    <img src="{{ $product->path }}" alt="Product Image" class="product-image">
                    <h4 class="product-price">{{ $product->price }}$</h4>
                    <h4>{{ $product->description }}</h4>
                    <form action="{{ route('addToCart') }}" method="post" class="button-container">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="hidden" name="storeId" value="{{$product->getCategory->getStores->id}}">
                        <input type="number" value="1" min="1" name="quantity" style="width: 80px;">
                        <button type="submit" class="add-to-cart" data-product-id="{{ $product->id }}">Add to Cart</button>
                    </form>
                    <form action="{{ route('wishlistRoute') }}" method="post" class="button-container">
                        @csrf
                        <button type="submit" class="add-to-wishlist" data-product-id="{{ $product->id }}">Add to Wishlist</button>
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                    </form>
                </div>
            @endforeach
        @endif
    </div>
@endforeach





<div class='main-content'>

        <div class="payment">
            <h1 class="payTitle">Personal Information</h1>
            <label>Name and Surname</label>
            <input type="text" placeholder="First name" class="payInput">
            <label>Phone Number</label>
            <input type="text" placeholder="+1 234 5678" class="payInput">
            <label>Address</label>
            <input type="text" placeholder="Elton St 21 22-145" class="payInput">
            <h1 class="payTitle">Card Information</h1>
            <div class="cardIcons">
                <img src="./img/visa.png" width="40" alt="" class="cardIcon">
                <img src="./img/master.png" alt="" width="40" class="cardIcon">
            </div>
            <input type="password" class="payInput" placeholder="Card Number">
            <div class="cardInfo">
                <input type="text" placeholder="mm" class="payInput sm">
                <input type="text" placeholder="yyyy" class="payInput sm">
                <input type="text" placeholder="cvv" class="payInput sm">
            </div>
            <button class="payButton">Checkout!</button>
            <span class="close">X</span>
        </div>
    </div>
    <div class="gallery">
        <div class="galleryItem">
            <h1 class="galleryTitle">Enjoy!</h1>
            <img src="https://www.bing.com/images/search?view=detailV2&ccid=Bu8Bn8Ii&id=BCD73A1AF1D8C7595F9AB3A7611C200561D6EA6E&thid=OIP.Bu8Bn8IiCaA_d0o-1I87ZwHaHa&mediaurl=https%3a%2f%2ffastly.4sqi.net%2fimg%2fgeneral%2f600x600%2f30078804_nipDUc08n-fmFT4sxygD4RyeF0imnDcdTg2NS9OfyLg.jpg&cdnurl=https%3a%2f%2fth.bing.com%2fth%2fid%2fR.06ef019fc22209a03f774a3ed48f3b67%3frik%3dburWYQUgHGGnsw%26pid%3dImgRaw%26r%3d0&exph=600&expw=600&q=exotic+snacks+store+image&simid=608014013756440072&FORM=IRPRST&ck=61980D42FD02EF7E8B77FE88EA0EF2FA&selectedIndex=0&itb=0" alt =''>
             
        </div>
        <div class="galleryItem">
            <h1 class="galleryTitle">This is the First exotic snack i buy</h1>
        </div>
        <div class="galleryItem">
            <h1 class="galleryTitle">Our new Product!</h1>
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
        </div>
    </div>
    <div class="newSeason">
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/4753986/pexels-photo-4753986.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg">
        </div>
        <div class="nsItem">
            <h3 class="nsTitleSm">Summer sales</h3>
            <h1 class="nsTitle">New items</h1>
            <a href="#nav">
                <button class="nsButton">CHOOSE YOUR ITEMS</button>
            </a>
        </div>
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg">
        </div>
    </div>
    <footer>
        <div class="footerLeft">
            <div class="footerMenu">
                <h1 class="fMenuTitle">About Us</h1>
                <ul class="fList">
                    <li class="fListItem">Company</li>
                    <li class="fListItem">Contact</li>
                    <li class="fListItem">Careers</li>
                    <li class="fListItem">Affiliates</li>
                    <li class="fListItem">Stores</li>
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Useful Links</h1>
                <ul class="fList">
                    <li class="fListItem">Support</li>
                    <li class="fListItem">Refund</li>
                    <li class="fListItem">FAQ</li>
                    <li class="fListItem">Feedback</li>
                    <li class="fListItem">Stories</li>
                </ul>
            </div>
            <div class="footerMenu">
                <h1 class="fMenuTitle">Products</h1>
          
            </div>
        </div>
        <div class="footerRight">
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                <div class="fMail">
                    <input type="text" placeholder="your@email.com" class="fInput">
                    <button class="fButton">Join!</button>
                </div>
            </div>
            <div class="footerRightMenu">
                <h1 class="fMenuTitle">Follow Us</h1>
                <div class="fIcons">
                    <img src="./img/facebook.png" alt="" class="fIcon">
                    <img src="./img/twitter.png" alt="" class="fIcon">
                    <img src="./img/instagram.png" alt="" class="fIcon">
                    <img src="./img/whatsapp.png" alt="" class="fIcon">
                </div>
            </div>
            <div class="footerRightMenu">
                <span class="copyright">Exotic snacks. All rights reserved. 2024.</span>
            </div>
        </div>
</div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var cartCount = 0;

    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var productId = $(this).data('product-id');
            cartCount++;
            $('#cart-count').text(cartCount);
        });
    });

    function redirectToCartPage(url) {
        window.location.href = url;
    }
    
    document.addEventListener("DOMContentLoaded", function() {
    const categoryItems = document.querySelectorAll(".menuItem");
    const productLists = document.querySelectorAll(".product-list");

    categoryItems.forEach(function(item) {
        item.addEventListener("click", function() {
            const category = item.getAttribute("data-category");
            productLists.forEach(function(list) {
                if (list.getAttribute("data-category") === category) {
                    list.style.display = "block";
                } else {
                    list.style.display = "none";
                }
            });
        });
    });
});


</script>

</body>
</html>

@endsection;