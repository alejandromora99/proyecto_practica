google.maps.event.addDomListener(window, 'load', initialize);
//variable para instanciar el mapa
var map_f = null;
//variable para marcador
var markers = [];

//funcion para autocompletar una direccion
function initialize() {
    //restringo la busqueda solo a lugares de chile
    var options = {

        componentRestrictions: { country: "CL" },
        // strictBounds: true,
      };

    var input = document.getElementById('direccion');
    var autocomplete = new google.maps.places.Autocomplete(input, options);

    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();

        var filtered_array = place.address_components.filter(function(address_component){
            return address_component.types.includes("administrative_area_level_3");
        });
        var county = filtered_array.length ? filtered_array[0].long_name: "";
        // console.log(county);

        document.getElementById("lat").value = place.geometry['location'].lat();
        document.getElementById("lng").value = place.geometry['location'].lng();
        document.getElementById("comuna_direccion").value = county;

        var latitude = document.getElementById("lat").value;
        var longitude = document.getElementById("lng").value;
        // console.log("latitud: "+latitude + " longitud: "+longitude);
        // si el mapa no ha sido creado, se crea y se pone el marcador
        if(map_f == null){
            loadMap(latitude,longitude);
            set_marker(map_f,latitude,longitude);
        // sino solo se pone el marcador
        }else{
            //borro el marcador anterior
            for(i=0; i<markers.length; i++){
                markers[i].setMap(null);
            }

            //agrego nuevo marcador
            set_marker(map_f,latitude,longitude);
        }

        // alert(map_f.getBounds());

        
        
    });
}

//funcion que carga el mapa
function loadMap(latitude,longitude){
    latitude_f = parseFloat(latitude);
    longitude_f = parseFloat(longitude);
    //creo objeto de mapa
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 12,
        // center: {latitude_f, longitude_f},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // google.maps.event.addListener(map, 'bounds_changed', function() {
    //     alert(map.getBounds());
    // });
    
    // paso el mapa a una variable global
    map_f = map;

}

//funcion que coloca el marcador
function set_marker(map, latitude, longitude){
    latitude_f = parseFloat(latitude);
    longitude_f = parseFloat(longitude);
    var vMarker = new google.maps.Marker({
        position: new google.maps.LatLng(latitude_f, longitude_f)
    });
    // añado el marcador a una lista para despues removerlo en caso de
    markers.push(vMarker);
    // centra el mapa en las coordenadas dadas
    map.setCenter(vMarker.position);

    // añado el marcador al mapa
    vMarker.setMap(map);
    //hago el mapa visible
    document.getElementById("map_canvas").style.display="block";
}