// SideNav
$(".button-collapse").sideNav();

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

// Tabs
$(document).ready(function(){
  $('ul.tabs').tabs();
});

// Select
$(document).ready(function() {
  $('select').material_select();
});

// Textarea1 Resize
$('#textarea1').trigger('autoresize');

// Textarea2 Resize
$('#textarea2').trigger('autoresize');
