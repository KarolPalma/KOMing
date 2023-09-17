function revisarID() {
    //Revisa mediante AJAX que no se trate de insertar un numero de id vacio o uno ya registrado
    var id = document.getElementById("txtID").value;
    if (id == "") {
        alert("Por favor ingrese la id del bus");
        document.getElementById("txtID").focus();
    } else if (id.value != "") {
        $.ajax({
            type: 'POST',
            url: '../../php/buses/consultaID.php',
            data: { //Se envia la variable a consultaIdentidad.php
                id_bus: id
            },
            dataType: 'html'
        })
            .done(function (respuesta) {
                if (respuesta == 1) { //Si el conteo de registros de cosultaIdentidad.php es igual a 1, quiere decir que ya existe ese ID
                    alert("Ya existe un bus con este número de id");
                } else { //Si no existe el ID, pasa a la siguiente funcion de abajo
                    return validar();
                }
            });
    }
    return false
}

function validar() {
    //Valida que los campos requeridos no se encuentren vacios
    //Para el form_actualizarBus.php esta funcion es llamada desde correosDinamicos.js
    if (document.getElementById("txtMarca").value == "") {
        alert("Por favor ingrese la marca del bus");
        document.getElementById("txtMarca").focus();
    } else if (document.getElementById("txtModelo").value == "") {
        alert("Por favor ingrese la marca del bus");
        document.getElementById("txtModelo").focus();
    } else if (document.getElementById("txtColor").value == "") {
        alert("Por favor ingrese el color del bus");
        document.getElementById("txtColor").focus();
    } else if (document.getElementById("txtCPersonas").value == "") {
        alert("Por favor ingrese la cantidad de personas");
        document.getElementById("txtCPersonas").focus();
    } else if (document.getElementById("txtCEncomiendas").value == "") {
        alert("Por favor ingrese la cantidad de encomiendas");
        document.getElementById("txtCEncomiendas").focus();
    }else {
        document.getElementById("accion").value = "guardar"; //Al actualizar este valor y hacer el submit puede realizarse la operacion de guardado en BD
        document.getElementById("formulario").submit();
    }
    return false;
}

function desactivar() {  //Funcion llamada por el boton de Desactivar en form_actualizarBus.php 
    if(confirm("¿Desea desactivar a este bus del sistema?")){ //Confirmacion de desactivacion verdadera (Ok)
        document.getElementById("accion").value = "desactivar"; //Al actualizar este valor y hacer el submit puede realizarse la operacion de desactivacion en BD
        document.getElementById("formulario").submit();
    }
    return false;
}