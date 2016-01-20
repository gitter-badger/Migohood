//SideNav
$(".button-collapse").sideNav();

//Dropdown
$('.dropdown-options').dropdown({
    constrain_width: false, // Allows a custom width
    hover: true,            // Activate on hover
    belowOrigin: true,      // Displays dropdown below the activator
    alignment: 'left'       // Displays dropdown with edge aligned to the left of button
  }
);

//material Select
$(document).ready(function() {
  $('select').material_select();
});
