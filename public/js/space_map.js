var map;                            // Default Map Variable
var city_lat = '42.3736158';        // Default city latitude
var city_lng = '-71.1097335';       // Default city longitude

// When Document Ready execute :
$(document).ready(function(){

  map = new GMaps({
    div: '#space_map',
    lat: city_lat,
    lng: city_lng,
    zoom: 12
  });

});
