// Radio Select
$(".toggle-btn:not('.noscript') input[type=radio]").addClass("visuallyhidden");
$(".toggle-btn:not('.noscript') input[type=radio]").change(function() {
    if( $(this).attr("name") ) {
        $(this).parent().addClass("success").siblings().removeClass("success")
    } else {
        $(this).parent().toggleClass("success");
    }
});

// When a radio is selected show a specific div
$(document).ready(function() {
   $('input[type="radio"]').click(function() {

       if($(this).attr('id') == 'space') {
          $('#space-form').show();
       } 
       else {
          $('#space-form').hide();
       }

       if($(this).attr('id') == 'workspace') {
          $('#workspace-form').show();
       }
       else {
          $('#workspace-form').hide();
       }

       if($(this).attr('id') == 'parking') {
          $('#parking-form').show();
       }
       else {
          $('#parking-form').hide();
       }

       if($(this).attr('id') == 'service') {
          $('#service-form').show();
       }
       else {
          $('#service-form').hide();
       }

   });
});
