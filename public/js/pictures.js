// When Document Ready execute :
$(document).ready(function() {

  // Enable input click
  $('#thumb-submit').on('click', function(e) {    // If button is clicked
    e.preventDefault();
      $("#thumb-input").trigger('click');         // Trigger input
  });

  $("#thumb-input").change(function() {           // If input has file
      $("#thumb-send").trigger('click');          // Trigger file upload send
  });

  // Enable input click
  $('#gallery-submit').on('click', function(e) {  // If button is clicked
    e.preventDefault();
      $("#gallery-input").trigger('click');       // Trigger file upload select
  });

  // If input has files send request
  $("#gallery-input").change(function() {
      if($(this).get(0).files.length != 0) {
        $("#gallery-send").trigger('click');      // Trigger file upload send
      }
  });

});
