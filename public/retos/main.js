$("#trimestre1").show();
$(".41").addClass('active');
$("#trimestre2").hide();
$("#trimestre3").hide();

$(".mes5").hide();
$(".mes6").hide();
$(".mes7").hide();
$(".mes8").hide();
$(".mes9").hide();
$(".mes10").hide();
$(".mes11").hide();
$(".mes12").hide();

function showTrimestre1(){
    $("#trimestre1").show(1000);
    $("#trimestre2").hide(1000);
    $("#trimestre3").hide(1000);
    $(".43").removeClass('active');
    $(".42").removeClass('active');
    $(".41").addClass('active');

    $(".mes1").show(1000);
    $(".mes2").show(1000);
    $(".mes3").show(1000);
    $(".mes4").show(1000);
    $(".mes5").hide(800);
    $(".mes6").hide(800);
    $(".mes7").hide(800);
    $(".mes8").hide(800);
    $(".mes9").hide(800);
    $(".mes10").hide(800);
    $(".mes11").hide(800);
    $(".mes12").hide(800);
}

function showTrimestre2(){
    $("#trimestre1").hide(1000);
    $("#trimestre2").show(1000);
    $("#trimestre3").hide(1000);
    $(".43").removeClass('active');
    $(".42").addClass('active');
    $(".41").removeClass('active');

    $(".mes1").hide(800);
    $(".mes2").hide(800);
    $(".mes3").hide(800);
    $(".mes4").hide(800);
    $(".mes5").show(1000);
    $(".mes6").show(1000);
    $(".mes7").show(1000);
    $(".mes8").show(1000);
    $(".mes9").hide(800);
    $(".mes10").hide(800);
    $(".mes11").hide(800);
    $(".mes12").hide(800);
}

function showTrimestre3(){
    $("#trimestre1").hide(1000);
    $("#trimestre2").hide(1000);
    $("#trimestre3").show(1000);
    $(".41").removeClass('active');
    $(".42").removeClass('active');
    $(".43").addClass('active');

    $(".mes1").hide(800);
    $(".mes2").hide(800);
    $(".mes3").hide(800);
    $(".mes4").hide(800);
    $(".mes5").hide(800);
    $(".mes6").hide(800);
    $(".mes7").hide(800);
    $(".mes8").hide(800);
    $(".mes9").show(1000);
    $(".mes10").show(1000);
    $(".mes11").show(1000);
    $(".mes12").hide(800);
}