var cont = 1;
var numeroAsiento = 0;
function reservaDisponible(numAsiento) {
    let opcion = document.getElementById(numAsiento).value;
    if (opcion == "vacio" && cont <= 1) { //Permite seleccionar un asiento vacio
        document.getElementById(numAsiento).value = "reservado";
        document.getElementById(numAsiento).className = "reserva";
        cont++;
        numeroAsiento = numAsiento;
        document.getElementById("txtReservaAsiento").value = numAsiento; //el elemento txtReservaAsiento almacena el número de asiento reservado para enviarlo a la Base de Datos.
        alert("Se ha seleccionado el asiento "+ numAsiento + ".");
    }else if (opcion == "reservado"){ //El asiento reservado vuelve a estar disponible.
        document.getElementById(numAsiento).value = "vacio";
        document.getElementById(numAsiento).className = "disponible";
        numeroAsiento = 0;
        cont--;
    }else if(opcion == "noDisponible"){ //Son asientos no disponibles reservados de otros boletos.
    }
    else if (cont >= 1){ //No se puede escoger más de un asiento.
        alert("Solo puede escoger un asiento.");
    }
    return false;
}

var contAct = 0;
function actualizarReserva(numAsiento) {
    let opcion = document.getElementById(numAsiento).value;
    if (opcion == "reservado" && contAct == 0) { //El asiento reservado vuelve a estar disponible.
        document.getElementById(numAsiento).value = "vacio";
        document.getElementById(numAsiento).className = "disponible";
        contAct++;
        numeroAsiento = 0;
    }else if (opcion == "vacio" && contAct == 1){ //Permite seleccionar un asiento vacio
        document.getElementById(numAsiento).value = "reservado";
        document.getElementById(numAsiento).className = "reserva";
        contAct--;
        numeroAsiento = numAsiento;
        document.getElementById("txtReservaAsiento").value = numAsiento; //el elemento txtReservaAsiento almacena el número de asiento reservado para enviarlo a la Base de Datos.
        alert("Se ha seleccionado el asiento "+ numAsiento + ".");
    }else if(opcion == "noDisponible"){ //Son asientos no disponibles reservados de otros boletos.
    }
    else if (contAct == 0){ //No se puede escoger más de un asiento.
        alert("Solo puede escoger un asiento.");
    }
    return false;
}


function opViajeSeleccionado(){
 
    //alert("La checkViaje seleccionada es: " + $('input:radio[name=checkViaje]:checked').val());

    var numViaje = $('input:radio[name=checkViaje]:checked').val();
    $.ajax({
        type: 'POST',
        url: '../../php/boletos/mostrarReservaAsiento.php',
        data: {
            numeroViaje: numViaje
        },
        success:function(respuesta){
            $("#mostrarReservacion").html(respuesta);
        }
    });

    $.ajax({
        type: 'POST',
        url: '../../php/boletos/mostrarInfo.php',
        success:function(respuesta){
            $("#tablaInfo").html(respuesta);
        }
    });
    return false;

}

function revisarOrigenDestino() {
    var idTerminalOrigen = document.getElementById("cmbTerminalOrigen").value;
    var idTerminalDestino = document.getElementById("cmbTerminalDestino").value;
    if (idTerminalOrigen == "") {
        alert("Por favor ingrese la terminal de origen");
        document.getElementById("cmbTerminalOrigen").focus();
    } else if (idTerminalDestino == "") {
        alert("Por favor ingrese la terminal de destino");
        document.getElementById("cmbTerminalDestino").focus();
    } else {
        document.getElementById("accion").value = "consultar";
        document.getElementById("formulario").submit();
    }
    return false
}

function revisarIdentidad() {
    var identidad = document.getElementById("txtIdentidad").value;
    if (identidad == "") {
        alert("Por favor ingrese la identidad del cliente");
        document.getElementById("txtIdentidad").focus();
    } else if (identidad.value != "") {
        $.ajax({
            type: 'POST',
            url: '../../php/clientes/consultaIdentidad.php',
            data: { //Se envia la variable a consultaIdentidad.php
                identidad_cliente: identidad
            },
            dataType: 'html'
        })
            .done(function (respuesta) {
                if (respuesta == 1) {
                    return validar();
                } else { //Si no existe el ID, pasa a la siguiente funcion de abajo
                    if (confirm("No existe un cliente registrado con este número de identidad, ¿Desea registrarlo?")) { //Confirmacion de desactivacion verdadera (Ok)
                        createPopupWin("../../forms/clientes/form_insertarCliente.php", "Insertar Nuevo Cliente", 800, 700);
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
    //Valida que los campos requeridos no se encuentren vacios
    if (document.getElementById("txtIdentidad").value == "") {
        alert("Por favor ingrese la identidad del cliente");
        document.getElementById("txtIdentidad").focus();
    } else if (document.querySelectorAll('input[type="radio"]:checked').length == 0) {
        alert("Por favor seleccione un viaje para completar la compra del boleto");
        document.getElementById("checkViaje").focus();
    } else if (document.getElementById("cmbTarifa").value == "") {
        alert("Por favor seleccione una tarifa de boletos para completar la compra");
        document.getElementById("cmbTarifa").focus();
    } else if(numeroAsiento == 0 || document.getElementById("txtReservaAsiento").value == ""){
        alert("Seleccione un asiento a reservar");
    }else {
        document.getElementById("accion").value = "guardar";
        document.getElementById("formulario").submit();
    }
    return false;
}

function validarActualizar() {
    //Valida que los campos requeridos no se encuentren vacios
    if(numeroAsiento == 0 || document.getElementById("txtReservaAsiento").value == ""){
        alert("Seleccione un asiento a reservar");
    }else {
        document.getElementById("accion").value = "guardar";
        document.getElementById("formulario").submit();
    }
    return false;
}