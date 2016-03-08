var map;                            // Default Map Variable
var city_lat = '42.3736158';        // Default city latitude
var city_lng = '-71.1097335';       // Default city longitude

$(document).ready(function(){

  // Set Default Map
  setMap(city_lat, city_lng);

  // Get the option selected in cities dropdown select
  $( "#city" ).change(function () {
    $("#city option:selected").each(function() {

        // Call to method that Return json with city's info
        var url = "/request/json/city/" + $( this ).val();

        // Decode JSON
        $.getJSON(url)
          .done(function ( data ) {
              setMap(data.lat, data.lng);           // Set new map
              setCircleMarker(data.lat, data.lng);  // Set new marker
          });

      });
    }).change();

    // TODO: with input type text

});

// Pass data to Map
function setMap(var_lat, var_lng) {
  map = new GMaps({
    div: '#location_map',
    lat: var_lat,
    lng: var_lng,
    zoom: 12
  });
}

// Circle in the map
function setCircleMarker(var_lat, var_lng) {
  map.addMarker({
    lat: var_lat,
    lng: var_lng,
    icon: '/img/app/circle_mark.png'
  });
}
