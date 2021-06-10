@extends('master')
@section('css')
    
@endsection
@section('content')
    <h2>Marcadores guardados:</h2>

    <div class="form-group">
        <label for="comuna" id="lab_comuna" style=" display:none;">Elige una comuna:</label>
        <select name="comuna" id="comuna" class="form-control" style=" display:none;">
            <option value="todas">Mostrar todos</option>
            @foreach ($comunas as $comuna)
                <option value="{{$comuna->comuna_direccion}}">{{$comuna->comuna_direccion}}</option>
                
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <div id="map_markers" class="form-control" style=" display:none; width: auto; height: 400px;"></div>
    </div>
    <input type="button" class="btn btn-primary" value="Mostrar mapa" id="show_markers_map" >


@endsection
@section('js')
<script type="text/javascript"
src="https://maps.google.com/maps/api/js?key=AIzaSyBx2k43lsem3ljuOYCVOQEx8vuHqtDS6D8&libraries=places&callback">
</script>
<script type="text/javascript">
    
    document.getElementById("show_markers_map").addEventListener("click", loadMap);
    var markers = [];
    var json = @json($marcadores);
    var map_f = null;

    //funcion que carga el mapa y pone los marcadores
    function loadMap(){
        // Si el objeto esta vacio
        if(Object.keys(json).length === 0){
            alert("No existen registros de marcadores");
        }else{
            //creo objeto de mapa
            var map = new google.maps.Map(document.getElementById('map_markers'), {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                // restriction: {latLngBounds:{north: 83.8, south: -57, west: -180, east: 180}}
            });
            map_f = map;
            //hago el mapa visible
            document.getElementById("map_markers").style.display="block";
            document.getElementById("show_markers_map").style.display="none";
            document.getElementById("lab_comuna").style.display="block";
            document.getElementById("comuna").style.display="block";

            mostrar_todos();
            
        }
        
    }

    document.getElementById("comuna").addEventListener("change", select_markers);

    function select_markers(){
        // Si el objeto esta vacio
        if(this.value == "todas"){
            mostrar_todos();
        }else{
            //borro los marcadores anteriores
            for(i=0; i<markers.length; i++){
                markers[i].setMap(null);
            }
            
            var limites = new google.maps.LatLngBounds();
            for (x of json) {
                if(this.value == x.comuna_direccion){
                    var vMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(x.lat, x.lng),
                    title: x.direccion
                    });
                    limites.extend(vMarker.position);
                    markers.push(vMarker);
                    vMarker.setMap(map_f);
                }
            }

            map_f.fitBounds(limites);
        }
    }

    function mostrar_todos(){
        var limites = new google.maps.LatLngBounds();
        for (x of json) {

            var vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(x.lat, x.lng),
                title: x.direccion
            });
            
            //guardo los marcadores en una lista para despues poder borrarlos
            markers.push(vMarker);
            limites.extend(vMarker.position);
            // añado el marcador al mapa
            vMarker.setMap(map_f);
                

                
        }
        map_f.fitBounds(limites);
    }
</script>
@endsection