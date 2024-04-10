@extends('layouts.app')

@section('content')

<nav class="navbar navbar-expand-md navbar-light absolute py-2 mb-4">
    <div class="container">
        <div class=" navbar-collapse " id="navbarCollapse">
            <ul class="navbar-nav mx-auto">
                <a href="" class="navbar-brand">
                    <h2 class="d-inline align-middle"><strong>Pin Your Location</strong></h2>
                </a>
            </ul>

        </div>
    </div>
</nav>

    <div class="content">
        <h1>USER/SHOP SIDE</h1>
        <form action="/insertUserAddress" method="post">
            @csrf
            <div class="mapform">
                <div class="row">
                    <div class="col-5">
                        <input type="text" disabled class="form-control" placeholder="lat" name="latitude" id="lat">
                    </div>
                    <div class="col-5">
                        <input type="text" disabled class="form-control" placeholder="lng" name="longitude" id="lng">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="addressname" name="addressname" id="addressname">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="uid" name="uid" id="uid">
                    </div>

                </div>
                

                <div id="map" style="height: 400px; width: 800px;" class="my-3"></div>

                <script>
                    let map;
                    function initMap(){
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: { lat: 33.888630, lng: 35.5018 },
                            zoom: 12,
                            scrollwheel:true,
                        });

//-----------NEED TO MAKE FUNCTION TO CREATE MARKERS

                        let POS = { lat: 33.888630, lng: 35.5018 };
                        const marker = new google.maps.Marker({
                            position: POS,
                            map: map,
                            draggable:true
                        });

                        google.maps.event.addListener(marker,'position_changed',
                            function(){
                                let lat= marker.position.lat();
                                let lng= marker.position.lng();

                                $('#lat').val(lat)
                                $('#lng').val(lng)
                            })

                            google.maps.event.addListener(map, 'click',
                            function(e){
                                position = e.latLng;
                                marker.setPosition(position);
                            })
                    }
                </script>

                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGoKNTDtWOzZbp7KxPzA30_amKwAe6VH0&callback=initMap"
                    type="text/javascript"></script>
            </div>

            <input type="submit" class="btn btn-primary">
            </form>


            
    </div>

    
@endsection