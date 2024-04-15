@extends('layouts.app')

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
        <form>
            <div class="row">     
                <div class="col-5">
                    <label for="name">Event Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-5">
                    <label for="name">Event date</label>
                    <input type="datetime-local">
                </div>
            </div>
        </form>    
    </div>

@endsection