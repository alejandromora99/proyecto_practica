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
        // console.log(place);
        // var coords = '-90.833910,13.994037 -90.833918,13.994095 -90.833924,13.994152 -90.833930,13.994207 -90.833936,13.994263 -90.833943,13.994322 -90.833951,13.994382 -90.833959,13.994440 -90.833965,13.994494 -90.833971,13.994548 -90.833978,13.994608 -90.833984,13.994671 -90.833993,13.994741 -90.834001,13.994811 -90.834010,13.994877 -90.834019,13.994940 -90.834028,13.995003 -90.834036,13.995060 -90.834044,13.995110 -90.834052,13.995162 -90.834061,13.995222 -90.834067,13.995281 -90.834074,13.995336 -90.834080,13.995390 -90.834086,13.995442 -90.834092,13.995495 -90.834100,13.995553 -90.834105,13.995610 -90.834110,13.995665 -90.834116,13.995718 -90.834122,13.995769 -90.834127,13.995820 -90.834134,13.995871 -90.834141,13.995924 -90.834146,13.995974 -90.834149,13.996008 -90.834192,13.996161 -90.834732,13.996091 -90.835519,13.995989 -90.836038,13.995931 -90.836696,13.995846 -90.836677,13.995819 -90.836660,13.995674 -90.836610,13.995123 -90.836480,13.994146 -90.836461,13.994126 -90.836370,13.994036 -90.836287,13.994044 -90.836194,13.994035 -90.836012,13.993789 -90.836003,13.993753 -90.835995,13.993581 -90.836245,13.993529 -90.836375,13.993521 -90.836386,13.993516 -90.836394,13.993512 -90.836394,13.993503 -90.836395,13.993404 -90.836309,13.992635 -90.836266,13.992318 -90.836207,13.991926 -90.836192,13.991927 -90.836170,13.991932 -90.836125,13.991938 -90.836074,13.991943 -90.836010,13.991951 -90.835936,13.991961 -90.835862,13.991968 -90.835791,13.991976 -90.835722,13.991980 -90.835658,13.991985 -90.835597,13.991994 -90.835533,13.992003 -90.835471,13.992011 -90.835408,13.992018 -90.835346,13.992025 -90.835285,13.992033 -90.835228,13.992040 -90.835173,13.992045 -90.835118,13.992051 -90.835062,13.992057 -90.835002,13.992063 -90.834936,13.992071 -90.834868,13.992078 -90.834800,13.992086 -90.834733,13.992094 -90.834663,13.992102 -90.834588,13.992111 -90.834523,13.992120 -90.834474,13.992123 -90.834421,13.992129 -90.834361,13.992133 -90.834298,13.992140 -90.834229,13.992149 -90.834160,13.992161 -90.834092,13.992171 -90.834022,13.992180 -90.833954,13.992185 -90.833889,13.992191 -90.833824,13.992198 -90.833761,13.992205 -90.833709,13.992212 -90.833680,13.992216 -90.833683,13.992242 -90.833693,13.992300 -90.833704,13.992370 -90.833712,13.992445 -90.833720,13.992518 -90.833727,13.992591 -90.833736,13.992661 -90.833745,13.992730 -90.833755,13.992795 -90.833764,13.992855 -90.833772,13.992913 -90.833779,13.992971 -90.833786,13.993033 -90.833792,13.993092 -90.833799,13.993149 -90.833807,13.993202 -90.833815,13.993251 -90.833823,13.993302 -90.833830,13.993358 -90.833837,13.993410 -90.833843,13.993462 -90.833849,13.993518 -90.833857,13.993579 -90.833864,13.993641 -90.833870,13.993700 -90.833876,13.993760 -90.833881,13.993817 -90.833887,13.993871 -90.833894,13.993927 -90.833902,13.993982 -90.833910,13.994037';
        // var area = new google.maps.Polygon({
        //     paths: coords,
        //     strokeColor: '#FF0000',
        //     strokeOpacity: 0.8,
        //     strokeWeight: 3,
        //     fillColor: '#FF0000',
        //     fillOpacity: 0.35
        //   });

        // var probando = google.maps.geometry.poly.containsLocation(place.geometry.location, area)}
        // console.log(probando);

        // var filtrado_region = place.address_components.filter(function(address_component){
        //     return address_component.types.includes("administrative_area_level_1");
        // });
        // var region = filtrado_region.length ? filtrado_region[0].long_name: "";
        // // console.log(county);

        var filtrado_comuna = place.address_components.filter(function(address_component){
            return address_component.types.includes("administrative_area_level_3");
        });
        var comuna = filtrado_comuna.length ? filtrado_comuna[0].long_name: "";
        // console.log(county);


        // if(region !== "Bío Bío"){
        //     alert("Porfavor ingresar una direccion que corresponda a la región del Biobío");
        //     document.getElementById("lat").value = "";
        //     document.getElementById("lng").value = "";
        //     document.getElementById("direccion").value = "";
        //     document.getElementById("comuna_direccion").value = "";
        //     return false;
        // }

        document.getElementById("lat").value = place.geometry['location'].lat();
        document.getElementById("lng").value = place.geometry['location'].lng();
        document.getElementById("comuna_direccion").value = comuna;

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