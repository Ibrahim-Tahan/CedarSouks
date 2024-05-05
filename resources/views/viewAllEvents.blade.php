@extends('layouts.eventapp')


@section('css')


@endsection


@section('navigation')
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <a href="" class="navbar-brand">
                    <h2 class="d-inline align-middle"><strong>Here are All the events for your stores</strong></h2>
                </a>
            </ul>
        </div>
    </div>
@endsection
@section('content')
<div class="container">
    @foreach ($stores as $store)
    <div class="row">
        <div class="col">
            <h1>{{$store->name}}</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($store->getEvents as $event )
        <div class="col">
            <div class="card mb-3" style="max-width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$event->title}} - On: {{$event->date}}</h5>
                    <p class="card-text"><b>Description: </b>{{$event->description}}</p>
                    <a href="#" class="btn">View Products</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    @endforeach
    <br>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="{{route('eventIndex',['id'=> $person->id]) }}">Add New Event</a>
        </div>    
        <div class="col">
            <a href="{{ route('home') }}" class="btn btn-danger">Close</a>
        </div>    
    </div>

</div>

@endsection