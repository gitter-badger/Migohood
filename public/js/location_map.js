var map;                            // Default Map Variable
var city_lat = '42.3736158';        // Default city latitude
var city_lng = '-71.1097335';       // Default city longitude
var global_query = '';              // Default global query

// When Document Ready execute :
$(document).ready(function(){

  // If it hasn't been selected a city, user won't be able to typing an address
  if(document.getElementById('city').value == '') {
    $(" #address ").prop('disabled', true);         // Disable the address input
    setMap(city_lat, city_lng, 'far');              // Set Default Map
  }
  else {
    setMap(document.getElementById('lat').value, document.getElementById('lng').value, 'near');   // Set Current Map
    global_query = document.getElementById('current_city').value;                                 // Set Current City
  }

  // Get the option selected in cities dropdown select
  $("#city").change(function () {
    $("#city option:selected").each(function() {
        if($(this).val()!=''){

        // Call to method that Return json with city's info
        $.getJSON("/request/json/city/" + $( this ).val())
          .done(function ( data ) {
              setMap(data.lat, data.lng, 'far');                                    // Set new map
              setMarker(data.lat, data.lng);                                        // Set new marker
              $(" #address ").prop('disabled', false);                              // Enable the address input
              global_query = data.name + ', ' + data.state + ', ' + data.country;   // Set City selected as a variable
          });
          
        }
      });
    }).change();


    // Get the text in address input
    $("#address").change(function () {
        if($(this).val()!=''){

            // Call to method that geocode the map
            GMaps.geocode({
              address: $(this).val() + ', ' + global_query.trim(),
              callback: function(results, status){
                if(status=='OK'){
                  var latlng = results[0].geometry.location;            // Locate using string + global_query
                  setMap(latlng.lat(), latlng.lng(), 'near');           // Set new map
                  setMarker(latlng.lat(), latlng.lng());                // Set new marker
                  document.getElementById('lat').value = latlng.lat();  // Fill Data in Latitude hidden input
                  document.getElementById('lng').value = latlng.lng();  // Fill Data in Longitude hidden input
                }
              }
            });

        }
    }).change();

});

// Pass data to Map
function setMap(var_lat, var_lng, type) {
  // Show map far
  if(type=='far') {
    map = new GMaps({
      div: '#location_map',
      lat: var_lat,
      lng: var_lng,
      zoom: 12
    });
  }

  // Show map near
  if(type=='near') {
    map = new GMaps({
      div: '#location_map',
      lat: var_lat,
      lng: var_lng
    });
  }
}

// Set Pin in the map
function setMarker(var_lat, var_lng) {
  map.addMarker({
    lat: var_lat,
    lng: var_lng,
    icon: '/img/app/pin_mark.png'
  });
}
