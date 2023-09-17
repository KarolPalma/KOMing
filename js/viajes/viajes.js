function cargarChoferes() {
    $.ajax({
        type: "POST",
        url: "../../php/viajes/consultaChofer.php",
        dataType: 'html',
        data: {
            'chofer': $('#txtChofer').val(),
            'fecha': $('#txtFechaSalida').val(),
            'hora': $('#txtHoraSalida').val()
        },
        success: function (respuesta) {
            $('#cmbChofer').html(respuesta);
        }
    });
    return false;
}

$(document).ready(function () {
    cargarChoferes();
    $('#cmbTerminalDestino').change(function () {
        cargarChoferes();
    });
    $('#txtFechaSalida').change(function () {
        cargarChoferes();
    });
    $('#txtHoraSalida').change(function () {
        cargarChoferes();
    });
    return false;
})

function cargarBuses() {
    $.ajax({
        type: "POST",
        url: "../../php/viajes/consultaBus.php",
        dataType: 'html',
        data: {
            'bus': $('#txtBus').val(),
            'fecha': $('#txtFechaSalida').val(),
            'hora': $('#txtHoraSalida').val()
        },
        success: function (respuesta) {
            $('#cmbBus').html(respuesta);
        }
    });
    return false;
}

$(document).ready(function () {
    cargarBuses();
    $('#cmbTerminalDestino').change(function () {
        cargarBuses();
    });
    $('#txtFechaSalida').change(function () {
        cargarBuses();
    });
    $('#txtHoraSalida').change(function () {
        cargarBuses();
    });
    return false;
})

function revisarTarifaBoletos() {
    var idTerminalOrigen = document.getElementById("cmbTerminalOrigen").value;
    var idTerminalDestino = document.getElementById("cmbTerminalDestino").value;
    if (idTerminalOrigen == "") {
        alert("Por favor ingrese la terminal de origen");
        document.getElementById("cmbTerminalOrigen").focus();
    } else if (idTerminalDestino == "") {
        alert("Por favor ingrese la terminal de destino");
        document.getElementById("cmbTerminalDestino").focus();
    } else if (idTerminalOrigen != "" && idTerminalDestino != "") {
        $.ajax({
            type: 'POST',
            url: '../../php/viajes/consultaTarifaBoletos.php',
            data: {
                origen: idTerminalOrigen,
                destino: idTerminalDestino
            },
            dataType: 'html'
        })
            .done(function (respuesta) {
                if (respuesta != 0) {
                    return revisarTarifaEncomiendas();
                } else {
                    if (confirm("No existe ninguna tarifa de boletos registrada para este origen y destino, ¿Desea registrar una nueva?")) { //Confirmacion de desactivacion verdadera (Ok)
                        createPopupWin("../../forms/tarifas_boletos/form_insertarTarifaBoleto.php", "Insertar Nueva Tarifa de Boletos", 650, 700);
                    }
                }
            });
    }
    return false
}

function revisarTarifaEncomiendas() {
    var idTerminalOrigen = document.getElementById("cmbTerminalOrigen").value;
    var idTerminalDestino = document.getElementById("cmbTerminalDestino").value;
    if (idTerminalOrigen == "") {
        alert("Por favor ingrese la terminal de origen");
        document.getElementById("cmbTerminalOrigen").focus();
    } else if (idTerminalDestino == "") {
        alert("Por favor ingrese la terminal de destino");
        document.getElementById("cmbTerminalDestino").focus();
    } else if (idTerminalOrigen != "" && idTerminalDestino != "") {
        $.ajax({
            type: 'POST',
            url: '../../php/viajes/consultaTarifaEncomiendas.php',
            data: {
                origen: idTerminalOrigen,
                destino: idTerminalDestino
            },
            dataType: 'html'
        })
            .done(function (respuesta) {
                if (respuesta != 0) {
                    document.getElementById("accion").value = "guardar";
                    document.getElementById("formulario").submit();
                } else {
                    if (confirm("No existe ninguna tarifa de encomiendas registrada para este origen y destino, ¿Desea registrar una nueva?")) {
                        createPopupWin("../../forms/tarifas_encomiendas/form_insertarTarifaEncomienda.php", "Insertar Nueva Tarifa de Encomiendas", 650, 700);
                    }
                }
            });
    }
    return false
}

function createPopupWin(pageURL, pageTitle,
    popupWinWidth, popupWinHeight) {
    var left = (screen.width - popupWinWidth) / 2;
    var top = (screen.height - popupWinHeight) / 4;

    var myWindow = window.open(pageURL, pageTitle,
        'resizable=yes, width=' + popupWinWidth
        + ', height=' + popupWinHeight + ', top='
        + top + ', left=' + left);
    return false;
}

function validar() {
    if (document.getElementById("txtFechaSalida").value == "") {
        alert("Por favor ingrese la fecha de salida del viaje");
        document.getElementById("txtFechaSalida").focus();
    } else if (document.getElementById("txtHoraSalida").value == "") {
        alert("Por favor ingrese la hora de salida del viaje");
        document.getElementById("txtHoraSalida").focus();
    } else if (document.getElementById("txtFechaLlegada").value == "") {
        alert("Por favor ingrese la fecha estimada de llegada del viaje a su destino");
        document.getElementById("txtFechaLlegada").focus();
    } else if (document.getElementById("txtHoraLlegada").value == "") {
        alert("Por favor ingrese la hora estimada de llegada del viaje");
        document.getElementById("txtHoraLlegada").focus();
    } else if ((document.getElementById("txtFechaSalida").value + ' ' + document.getElementById("txtHoraSalida").value) >=
        (document.getElementById("txtFechaLlegada").value + ' ' + document.getElementById("txtHoraLlegada").value)) {
        alert("La fecha y hora de salida debe ser mayor a la fecha y hora de llegada");
        document.getElementById("txtFechaLlegada").focus();
    } else if (document.getElementById("cmbChofer").value == "") {
        alert("Por favor seleccione un chofer encargado de conducir el bus para el viaje");
        document.getElementById("cmbChofer").focus();
    } else if (document.getElementById("cmbBus").value == "") {
        alert("Por favor seleccione un bus para el viaje");
        document.getElementById("cmbBus").focus();
    } else if (document.getElementById("cmbEstado").value == "") {
        alert("Por favor seleccione un estado inicial para el viaje");
        document.getElementById("cmbEstado").focus();
    } else {
        return revisarTarifaBoletos();
    }
    return false;
}

function generar() {
    if (document.getElementById("cmbChofer").value == "") {
        alert("Por favor seleccione un chofer encargado de conducir el bus para el viaje");
        document.getElementById("cmbChofer").focus();
    } else if (document.getElementById("cmbBus").value == "") {
        alert("Por favor seleccione un bus para el viaje");
        document.getElementById("cmbBus").focus();
    } else if (document.getElementById("cmbEstado").value == "") {
        alert("Por favor seleccione un estado inicial para el viaje");
        document.getElementById("cmbEstado").focus();
    } else {
        document.getElementById("accion").value = "generar";
        document.getElementById("formulario").submit();
    }
    return false;
}

function generarReporte(numViaje) {
    document.getElementById("accion").value = "generarReporte";
    document.getElementById("numViaje").value = numViaje;
    document.getElementById("formulario").submit();
    
    return false;
}