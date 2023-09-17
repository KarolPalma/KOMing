function revisarOrigenDestino() {
    var idTerminalOrigen = document.getElementById("cmbTerminalOrigen").value;
    var idTerminalDestino = document.getElementById("cmbTerminalDestino").value;
    var volumen = document.getElementById("txtVolumen").value;
    if (volumen == "") {
        alert("Por favor ingrese el volumen de la encomienda");
        document.getElementById("cmbTerminalOrigen").focus();
    } else if (idTerminalOrigen == "") {
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
    var idEmisor = document.getElementById("txtIdEmisor").value;
    var idReceptor = document.getElementById("txtIdReceptor").value;
    if (idEmisor == "") {
        alert("Por favor ingrese la identidad del emisor");
        document.getElementById("txtIdEmisor").focus();
    } else if (idReceptor == "") {
        alert("Por favor ingrese la identidad del receptor");
        document.getElementById("txtIdReceptor").focus();
    } else if (idEmisor.value != "" && idReceptor.value != "") {
        $.ajax({
            type: 'POST',
            url: '../../php/clientes/consultaIdentidad.php',
            data: { //Se envia la variable a consultaIdentidad.php
                identidad_cliente: idEmisor
            },
            dataType: 'html'
        })
            .done(function (respuesta) {
                if (respuesta == 0) { //Si no existe el ID del Emisor, pasa a la siguiente funcion de abajo
                    if (confirm("No existe un cliente emisor registrado con este número de identidad, ¿Desea registrarlo?")) { //Confirmacion de desactivacion verdadera (Ok)
                        createPopupWin("../../forms/clientes/form_insertarCliente.php", "Insertar Nuevo Cliente", 800, 700);
                    }


                    //return validar();
                } else { //Si el ID del emisor existe empieza a verificar que el ID del receptor tambien exista.
                    $.ajax({
                        type: 'POST',
                        url: '../../php/clientes/consultaIdentidad.php',
                        data: { //Se envia la variable a consultaIdentidad.php
                            identidad_cliente: idReceptor
                        },
                        dataType: 'html'
                    })
                        .done(function (respuesta) {
                            if (respuesta == 1) { //Si no existe el ID del Receptor, pasa a la siguiente funcion de abajo
                                return validar();
                            } else {
                                if (confirm("No existe un cliente receptor registrado con este número de identidad, ¿Desea registrarlo?")) { //Confirmacion de desactivacion verdadera (Ok)
                                    createPopupWin("../../forms/clientes/form_insertarCliente.php", "Insertar Nuevo Cliente", 800, 700);
                                }
                            }
                        });
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
    if (document.getElementById("txtIdEmisor").value == "") {
        alert("Por favor ingrese la identidad del emisor");
        document.getElementById("txtIdEmisor").focus();
    } else if (document.getElementById("txtIdReceptor").value == "") {
        alert("Por favor ingrese la identidad del receptor");
        document.getElementById("txtIdReceptor").focus();
    } else if (document.getElementById("txtVolumen").value == "") {
        alert("Por favor ingrese la volumen de la encomienda");
        document.getElementById("txtVolumen").focus();
    } else if (document.querySelectorAll('input[type="radio"]:checked').length == 0) {
        alert("Por favor seleccione un viaje para completar la compra del boleto");
        document.getElementById("checkViaje").focus();
    } else if (document.getElementById("cmbTarifa").value == "") {
        alert("Por favor seleccione una tarifa de boletos para completar la compra");
        document.getElementById("cmbTarifa").focus();
    } else {
        document.getElementById("accion").value = "guardar";
        document.getElementById("formulario").submit();
    }
    return false;
}