//Origen
function cargarCiudadesOrigen() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaCiudad.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaCiudad.php",
        dataType: 'html',
        data: {
            'pais': $('#cmbPaisOrigen').val(), //Recupera el valor en cmbPais
            'ciudad': $('#ciudadOrigen').val() //Recupera el valor en ciudad (solo usado en actualizaciones de registros) para marcar un option como seleccionado
        },
        success: function (respuesta) { //Responde con el llenado del cmbCiudad con la cadena de respuesta de PHP
            $('#cmbCiudadOrigen').html(respuesta);
        }
    });
    return false;
}

function cargarTerminalesOrigen() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaTerminal.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaTerminal.php",
        dataType: 'html',
        data: {
            'ciudad': $('#cmbCiudadOrigen').val(), //Recupera el valor en cmbCiudad
            'terminal': $('#terminalOrigen').val() //Recupera el valor en terminal (solo usado en actualizaciones de registros) para marcar un option como seleccionado
        },
        success: function (respuesta) {
            $('#cmbTerminalOrigen').html(respuesta); //Responde con el llenado del cmbTerminal con la cadena de respuesta de PHP
        }
    });
    return false;
}

function cargarVacioOrigen() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaVacio.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaVacio.php",
        dataType: 'html',
        success: function (respuesta) {
            $('#cmbTerminalOrigen').html(respuesta); //Responde con el llenado del cmbTerminal con la cadena de respuesta de PHP
        }
    });
    return false;
}

//Carga de datos de Origen
$(document).ready(function () { //Al cargar la pagina se activa esta funcion
    cargarVacioOrigen();
    cargarCiudadesOrigen();

    $('#cmbPaisOrigen').change(function () { //Al cambiar el estado del cmbPais se recargan las ciudades
        cargarVacioOrigen();
        cargarCiudadesOrigen();
    });
    return false;
})

$(document).ready(setTimeout(function () { //Despues de 0.200 segundos de cargar la pagina se llama a esta funcion
    cargarTerminalesOrigen();

    $('#cmbCiudadOrigen').change(function () { //Al cambiar el estado del cmbciudad se recargan las terminales
        cargarTerminalesOrigen();
    });
    return false;
}, 200)); //Este retraso es porque para marcar una terminal como seleccionada, la ciudad debe estar seleccionado tambien
          //Asi que despues de 0.200 segundos tanto la ciudad como la terminal pueden seleccionarse correctamente


//Destino

function cargarCiudadesDestino() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaCiudad.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaCiudad.php",
        dataType: 'html',
        data: {
            'pais': $('#cmbPaisDestino').val(), //Recupera el valor en cmbPais
            'ciudad': $('#ciudadDestino').val() //Recupera el valor en ciudad (solo usado en actualizaciones de registros) para marcar un option como seleccionado
        },
        success: function (respuesta) { //Responde con el llenado del cmbCiudad con la cadena de respuesta de PHP
            $('#cmbCiudadDestino').html(respuesta);
        }
    });
    return false;
}

function cargarTerminalesDestino() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaTerminal.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaTerminal.php",
        dataType: 'html',
        data: {
            'ciudad': $('#cmbCiudadDestino').val(), //Recupera el valor en cmbCiudad
            'terminal': $('#terminalDestino').val() //Recupera el valor en terminal (solo usado en actualizaciones de registros) para marcar un option como seleccionado
        },
        success: function (respuesta) {
            $('#cmbTerminalDestino').html(respuesta); //Responde con el llenado del cmbTerminal con la cadena de respuesta de PHP
        }
    });
    return false;
}

function cargarVacioDestino() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaVacio.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaVacio.php",
        dataType: 'html',
        success: function (respuesta) {
            $('#cmbTerminalDestino').html(respuesta); //Responde con el llenado del cmbTerminal con la cadena de respuesta de PHP
        }
    });
    return false;
}

// Carga de datos de Destino
$(document).ready(function () { //Al cargar la pagina se activa esta funcion
    cargarVacioDestino();
    cargarCiudadesDestino();

    $('#cmbPaisDestino').change(function () { //Al cambiar el estado del cmbPais se recargan las ciudades
        cargarVacioDestino();
        cargarCiudadesDestino();
    });
    return false;
})

$(document).ready(setTimeout(function () { //Despues de 0.200 segundos de cargar la pagina se llama a esta funcion
    cargarTerminalesDestino();

    $('#cmbCiudadDestino').change(function () { //Al cambiar el estado del cmbCiudad se recargan las terminales
        cargarTerminalesDestino();
    });
    return false;
}, 200)); //Este retraso es porque para marcar una terminal como seleccionada, la ciudad debe estar seleccionado tambien
          //Asi que despues de 0.200 segundos tanto la ciudad como la terminal pueden seleccionarse correctamente