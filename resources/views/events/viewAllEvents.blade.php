@extends('layouts.eventapp')


@section('css')


@endsection


@section('navigation')
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <li>
                    <a href="" class="navbar-brand">
                        <h2 class="d-inline align-middle"><strong>Here are All the events for your stores</strong></h2>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
<div class="container" style="margin-bottom: 2%">
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
                    <a href="{{route('event.addMoreProducts',['id'=>$event->id])}}" class="btn btn-primary">Add More Products</a>
                    <a href="{{route('event.showProducts',['id'=>$event->id])}}" class="btn btn-secondary">View Products</a>
                    <br>
                    <form action="{{route('event.deleteEvent',['id'=>$event->id])}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-danger" value="Delete Event">
                    </form>
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