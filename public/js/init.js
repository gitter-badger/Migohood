$(document).ready(function(){

  // Dropdown-Options
  $('.dropdown-options').dropdown({
      constrain_width: false, // Allows a custom width
      hover: true,            // Activate on hover
      belowOrigin: true,      // Displays dropdown below the activator
      alignment: 'left'       // Displays dropdown with edge aligned to the left of button
    }
  );

  // Dropdown-Notifications
  $('.dropdown-notifications').dropdown({
      constrain_width: false, // Allows a custom width
      hover: true,            // Activate on hover
      belowOrigin: true,      // Displays dropdown below the activator
      alignment: 'left'       // Displays dropdown with edge aligned to the left of button
    }
  );

  $(".button-collapse").sideNav();          // SideNav
  $('select').material_select();            // Select
  $('#textarea1').trigger('autoresize');    // Textarea1 Resize
  $('#textarea2').trigger('autoresize');    // Textarea2 Resize

});
