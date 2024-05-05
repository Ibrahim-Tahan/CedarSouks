@extends('layouts.app')

@section('navigation')
        <div class="container">
            <div class=" navbar-collapse " id="navbarCollapse">
                <ul class="navbar-nav mx-auto">
                    <a href="" class="navbar-brand">
                        <h2 class="d-inline align-middle"><strong>Pin Your Store Location</strong></h2>
                    </a>
                </ul>

            </div>
        </div>
@endsection
    @section('content')
    <div class="content">
        <h1>SHOP SIDE</h1>
        <form action="{{ route('insertShopLocation', ['id' => $store->id]) }}" method="post">
        @csrf
            <div class="mapform">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-5">
                        <label for="latitude">latitude</label>
                        <input type="text" readonly class="form-control" placeholder="lat" name="latitude" id="lat">
                    </div>
                    <div class="col-5">
                        <label for="longitude">longitude</label>
                        <input type="text" readonly class="form-control" placeholder="lng" name="longitude" id="lng">
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