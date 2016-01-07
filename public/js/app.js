//Hide from Alerts
$('.close').click(function () {
    $(this).parent().hide();
});


$('.tab').click(function() {
    $(this).addClass('active').siblings().removeClass('active');
});


function show( elem ) {
    $('.dynamic_link').hide();
    $('#'+elem).show();
}
