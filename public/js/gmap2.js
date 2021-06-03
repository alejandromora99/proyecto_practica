google.maps.event.addDomListener(window, 'load', gmap2());

function gmap2(){
    // Creating map object
    var map = new google.maps.Map(document.getElementById('map_canvas2'), {
        zoom: 12,
        center: new google.maps.LatLng(-36.82702032245828, -73.05027281791311),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    // creates a draggable marker to the given coords
    var vMarker2 = new google.maps.Marker({
        position: new google.maps.LatLng(-36.82702032245828, -73.05027281791311),
        draggable: true
    });

    document.getElementById("map_canvas2").style.display="block";

    // adds a listener to the marker
    // gets the coords when drag event ends
    // then updates the input with the new coords
    google.maps.event.addListener(vMarker2, 'dragend', function (evt) {
        // $("#latitude2").val(evt.latLng.lat().toFixed(6));
        document.getElementById("latitude2").value = evt.latLng.lat().toFixed(6);
        // $("#longitude2").val(evt.latLng.lng().toFixed(6));
        document.getElementById("longitude2").value = evt.latLng.lng().toFixed(6);
        
        map.panTo(evt.latLng);

        // centro el mapa en la coordenadas del marcador
        map.setCenter(vMarker2.position);

        var lat = document.getElementById("latitude2").value;
        var long = document.getElementById("longitude2").value;
        //creo objeto latlng de google
        var latlng = new google.maps.LatLng(lat,long);

        const geocoder = new google.maps.Geocoder();
        geocoder.geocode({ location: latlng }, (results, status) => {
            if(status === "OK" ){
                if(results[0]){
                    $("#direccion").val(results[0].formatted_address);
                }else{
                    alert("Ubicación no disponible.")
                }
                
            }else{
                alert("Hay un problema con los servicios de google.")
            }
        
    });
    });

   
    
    // adds the marker on the map
    vMarker2.setMap(map);
    
}