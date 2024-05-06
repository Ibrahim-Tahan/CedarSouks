@extends('layouts.eventapp')

@section('css')


@endsection


@section('navigation')
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <a href="" class="navbar-brand">
                    <h2 class="d-inline align-middle"><strong>Add Products to your event {{$event->title}}</strong></h2>
                </a>
            </ul>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
            <h2>Here are the products in the store chosen</h2>

            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Category</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Default Price</th>
                        <th scope="col">Bidding Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prods as $prod)
                        <tr>
                            <form action="/addProducts" method="POST">
                                @csrf
                                <input type="text" value="{{$event->id}}" name="eventId" id="eventId" hidden>
                                <input type="text" value="{{$prod->id}}" name="productId" id="productId" hidden>
                                <td>{{$prod->getCategory->name}}</td>
                                <td>{{$prod->name}}</td>
                                <td>${{$prod->price}}</td>
                                <td><input type="number" class="form-control" placeholder="Starting Price" name="bidding_price" id="bidding_price" required></td>
                                <td><button type="submit" class="btn-primary" id="addProductBtn">Add Product</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>                      

                        
            <div class="row">             
                <div class="col-5">
                    <a href="{{ route('home') }}" class="btn btn-danger">Close</a>
                </div>
            </div>
        
    </div>

    <script>
        var addProductBtn = document.getElementById('addProductBtn');
    
        addProductBtn.addEventListener('click', function() {
            addProductBtn.disabled = true;
        });
    </script>
    

@endsection