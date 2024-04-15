@extends('layouts.app')


@section('navigation')
        <div class="container">
            <div class=" navbar-collapse " id="navbarCollapse">
                <ul class="navbar-nav mx-auto">
                    <a href="" class="navbar-brand">
                        <h2 class="d-inline align-middle"><strong>Get Users Location</strong></h2>
                    </a>
                </ul>

            </div>
        </div>
@endsection

@section('content')
    <div class="content">
        <h1>SHOP SIDE ONLY</h1>

                <div id="map" style="height: 400px; width: 800px;" class="my-3"></div>

                <script>
                    let map;
                    function initMap(){
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: { lat: 33.888630, lng: 35.5018 },
                            zoom: 12,
                            scrollwheel:true,
                        });

//                        @foreach ($address1 as $addresses )

                        let POS = { lat: 33.888630, lng: 35.5018  };
                        const marker = new google.maps.Marker({
                            position: POS,
                            map: map,
                            draggable:false
                        });

  //                      @endforeach
                       
                    }
                </script>

                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGoKNTDtWOzZbp7KxPzA30_amKwAe6VH0&callback=initMap"
                    type="text/javascript"></script>
            </div>

            <input type="submit" class="btn btn-primary">
            </form>
            
    </div>

    
@endsection