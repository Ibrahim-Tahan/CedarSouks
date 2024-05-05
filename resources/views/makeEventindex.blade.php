@extends('layouts.eventapp')


@section('css')


@endsection


@section('navigation')
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <a href="" class="navbar-brand">
                    <h2 class="d-inline align-middle"><strong>Create Your Event Now</strong></h2>
                </a>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="content">
        <form action="/addEvent" method="POST">
            @csrf
            <div class="row">     
                <div class="col-5">
                    <label for="title">Event Name</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="col-5">
                    <label for="description">Event Description</label>
                    <textarea class="form-control" id="description" name="description" required>
                    </textarea>
                </div>

            </div>


            <div class="row">

                <div class="col-5">
                    <label for="date">Event date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="col-5">
                    <label for="time">Event Time</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>


            </div>
            <div class="row">
                <div class="col-5">                
                    <label for="store">Pick a store for this event</label>
                    <select class="form-control" name="storeId">
                        <option value=""></option>
                        @foreach ($stores as $store)
                            <option value="{{$store->id}}">{{$store->name}}</option>
                        @endforeach  
                    </select>
                </div>                        
            </div>
            <div class="row">
                <div class="col-5">
                    <input type="submit" class="btn-primary" value="Choose Products">
                </div>
                <div class="col-5">
                    <a href="{{ route('home') }}" class="btn btn-danger">Close</a>
                </div>
            </div>
        
        </form>    
    </div>

@endsection