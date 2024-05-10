@extends('layouts.eventapp')

@section('css')


@endsection


@section('navigation')
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <a href="" class="navbar-brand">
                    <h2 class="d-inline align-middle"><strong>Here are all the products to bid on {{$event->title}}</strong></h2>
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
                        <th scope="col">Bidding Price Now</th>
                        <th scope="col">New Bidding Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventProds as $eventProd)
                        <form action="/userProductBid/{{$eventProd->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{$eventProd->eventId}}" name="eventId" id="eventId" hidden>
                            <input type="text" value="{{$eventProd->productId}}" name="productId" id="productId" hidden>
                            <tr>
                                <td>{{$eventProd->getProducts->getCategory->name}}</td>
                                <td>{{$eventProd->getProducts->name}}</td>
                                <td>${{$eventProd->bidding_price}}</td>
                                <td><input type="number" class="form-control" placeholder="Enter Your Bid" name="bidding_price" id="bidding_price" required></td>
                                <td><input type="submit" class="btn btn-primary" value="Bid Now"></td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>                      

                        
            <div class="row">             
                <div class="col-5">
                    <a href="{{ route('home') }}" class="btn btn-danger">Close</a>
                </div>
            </div>
        
    </div>

@endsection