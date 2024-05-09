@extends('layouts.eventapp')


@section('css')


@endsection


@section('navigation')
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <li>
                    <a href="" class="navbar-brand">
                        <h2 class="d-inline align-middle"><strong>Here are All the events for you</strong></h2>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
<div class="container" style="margin-bottom: 2%">
    @foreach ($events as $event)    
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 30rem;">
                <div class="card-body">
                <h1>{{$event->getStore->name}}</h1>
                    <h5 class="card-title">{{$event->title}} - On: {{$event->date}}</h5>
                    <p class="card-text"><b>Description: </b>{{$event->description}}</p>
                    <a href="{{route('event.addMoreProducts',['id'=>$event->id])}}" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
        
    </div>
        @endforeach
        
    <br>
    <div class="row">
        <div class="col">
        </div>    
    </div>

</div>

@endsection