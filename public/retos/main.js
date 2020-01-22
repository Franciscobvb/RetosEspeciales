// inicializa grafica de avances
$("#trimestre1").show();
$(".41").addClass('active');
$("#trimestre2").hide();
$("#trimestre3").hide();

// oculta meses en el datatatble /* solo se ienen que mostrar en el excel */
$(".mes5").hide();
$(".mes6").hide();
$(".mes7").hide();
$(".mes8").hide();
$(".mes9").hide();
$(".mes10").hide();
$(".mes11").hide();
$(".mes12").hide();

// cambia pestañas en la grafica de los cuatrimestres (muestra los primeros 4 meses)
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

// muestra los otros 4 meses
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

// muestra los ultimos 4 meses
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

// carga los patrocinadores disponibles para registrarse con ellos
function loadUpline(){
    var associateid = $("#abiGralCode").val();
    $.ajax({
        type: "GET",
        url: "/loadupline?associateid=" + associateid,
        success: function(result) {
            $('#sponsor').append(result); 
        },
        error: function(result) {
            // en caso de error, avisa al usuario que no se puedo registrar la informacion
            swal(
                'Error!',
                'No es posible realizar el registro, contacta con soporte.',
                'error'
            )
        }
    });
}
loadUpline();

//envia los datos para ser guardados en la base
function submitReg(){
    var _token = $("#_token").val();
    var abicode = $("#abiCode").val().trim();
    var abiName = $("#abiName").val().trim();
    var dateReg = $("#dateReg").val().trim();
    var sponsor = $("#sponsor").val();
    var rank = $("#rank").val().trim();
    var sponsorCode = "";
    var sponsorName = "";
    if (typeof sponsor === 'undefined' || sponsor === null) {
        error();
    }
    else{
        if(abicode != "" && abiName != "" && dateReg != ""){
            sponsor = sponsor.split('-');
            sponsorCode = sponsor[0];
            sponsorName = sponsor[1];
            console.log()

            var data = {
                _token: _token,
                abicode: abicode,
                abiName: abiName,
                dateReg: dateReg,
                sponsorCode: sponsorCode,
                sponsorName: sponsorName,
                rank: rank
            }

            $.ajax({
                type: "POST",
                url: "/registeclubv",
                data: data,
                success: function(result) {
                    // si todo se gurdo correctamente, informa y recarga la paguina
                    if(result == "registrado"){
                        swal.queue([{
                            type: 'success',
                            title: 'Te has registrado correctamente',
                            allowOutsideClick: false,
                            showLoaderOnConfirm: true,
                            preConfirm: function() {
                                window.location.reload()
                            }
                        }]);
                    }
                    else if(result == "exist"){
                        swal.queue([{
                            type: 'error',
                            title: 'Ya te encuentras registrado en el club viajeros',
                            allowOutsideClick: false,
                        }]);
                    }
                },
                error: function(result) {
                    // en caso de error, avisa al usuario que no se puedo registrar la informacion
                    swal(
                        'Error!',
                        'No es posible realizar el registro, contacta con soporte.',
                        'error'
                    )
                }
            });
        }
        else{
            error();
        }
    }
    
};

function error(){
    swal(
        'Error!',
        'Todos los campos son obligatorios para el registro.',
        'error'
    )
}