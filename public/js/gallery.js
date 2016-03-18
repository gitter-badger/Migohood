// When Document Ready execute :
$(document).ready(function() {

  // If input has files send request
  $("#gallery-input").change(function() {
        //var names = [];
        //names.push($(this).get(0).files.length);
        //$("input[name=file]").val(names);
      
      if($(this).get(0).files.length != 0) {
        $("#gallery-send").trigger('click');  // Trigger file upload select
      }
  });

  // Enable input click
  $('#gallery-submit').on('click', function(e) {  // If button is clicked
    e.preventDefault();
      $("#gallery-input").trigger('click');  // Trigger file upload select
  });

});
