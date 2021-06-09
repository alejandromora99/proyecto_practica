@extends('master')
@section('content')
    <h2>Marcadores guardados:</h2>
    <div class="form-group">
        <div id="map_markers" class="form-control" style=" display:none; width: auto; height: 400px;"></div>
    </div>
    {{-- <script type="text/javascript" src="{{URL::asset('js/maps_markers.js')}}"></script> --}}
    <input type="button" class="btn btn-primary" value="Mostrar mapa" id="show_markers_map" >

    <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=AIzaSyBx2k43lsem3ljuOYCVOQEx8vuHqtDS6D8&libraries=places&callback">
    </script>
    <script type="text/javascript">
        
        document.getElementById("show_markers_map").addEventListener("click", loadMap);

        //funcion que carga el mapa y pone los marcadores
        function loadMap(){
            var json = @json($markers);
            //creo objeto de mapa
            var map = new google.maps.Map(document.getElementById('map_markers'), {
                zoom: 4,
                center: {lat: -36.817089523811774, lng: -73.04884065484434},
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            //hago el mapa visible
            document.getElementById("map_markers").style.display="block";
            document.getElementById("show_markers_map").style.display="none";
            
            // Si el objeto esta vacio
            if(Object.keys(json).length === 0){
                alert("No existen registros de marcadores");
            }else{
                for (x of json) {

                    var vMarker = new google.maps.Marker({
                        position: new google.maps.LatLng(x.lat, x.lng),
                        title: x.direccion
                    });

                    // añado el marcador al mapa
                    vMarker.setMap(map);
                    

                    }
            }
            
        }

    

    
    </script>
@endsection