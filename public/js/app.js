//Hide from Alerts
$('.close').click(function () {
    $(this).parent().hide();
});

//Div Selected
$('.tab').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
    $(this).find('input:radio')[0].checked = true;
});

//Hide and Show Elements
function show( elem ) {
    $('.dynamic_link').hide();
    $('#'+elem).show();
}

//Show Input (Services)
/*
function ShowInput() {
  var x = document.getElementById("Select").value;

  if(x == 'Other') {
    document.getElementById("other_service").style.display = 'block';
  }
  else {
    document.getElementById("other_service").style.display = 'none';
  }
}*/
