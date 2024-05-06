@extends('layouts.eventapp')

@section('css')


@endsection


@section('navigation')
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <a href="" class="navbar-brand">
                    <h2 class="d-inline align-middle"><strong>Here are the Products for this event {{$event->title}}</strong></h2>
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
                            <form action="/deleteEventProduct/{{ $prod->getEventUserProduct->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>{{$prod->getCategory->name}}</td>
                                <td>{{$prod->name}}</td>
                                <td>${{$prod->price}}</td>
                                <td>${{$prod->getEventUserProduct->bidding_price}}</td>
                                <td><input type="submit" class="btn btn-warning" value='Delete'></td>
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
            alert('Product Added')
        });
    </script>
    

@endsection