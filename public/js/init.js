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

//Material Select
$(document).ready(function() {
  $('select').material_select();
});

//Modal
$(document).ready(function(){
  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  $('.modal-trigger').leanModal();
});

//Date Picker
$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15 // Creates a dropdown of 15 years to control year
});
