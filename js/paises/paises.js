function cargarCiudades() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaCiudad.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaCiudad.php",
        dataType: 'html',
        data: {
            'pais': $('#cmbPais').val(), //Recupera el valor en cmbPais
            'ciudad': $('#ciudad').val() //Recupera el valor en ciudad (solo usado en actualizaciones de registros) para marcar un option como seleccionado
        },
        success: function (respuesta) { //Responde con el llenado del cmbCiudad con la cadena de respuesta de PHP
            $('#cmbCiudad').html(respuesta);
        }
    });
    return false;
}

function cargarTerminales() { //Solicita una consulta de PHP a la BD mediante datos mandados como JSON a consultaTerminal.php
    $.ajax({
        type: "POST",
        url: "../../php/paises/consultaTerminal.php",
        dataType: 'html',
        data: {
            'ciudad': $('#cmbCiudad').val(), //Recupera el valor en cmbCiudad
            'terminal': $('#terminal').val() //Recupera el valor en terminal (solo usado en actualizaciones de registros) para marcar un option como seleccionado
        },
        success: function (respuesta) {
            $('#cmbTerminal').html(respuesta); //Responde con el llenado del cmbTerminal con la cadena de respuesta de PHP
        }
    });
    return false;
}

$(document).ready(function () { //Al cargar la pagina se activa esta funcion
    cargarCiudades();

    $('#cmbPais').change(function () { //Al cambiar el estado del cmbPais se recargan las ciudades
        cargarCiudades();
    });
    return false;
})

$(document).ready(setTimeout(function () { //Despues de 0.200 segundos de cargar la pagina se llama a esta funcion
    cargarTerminales();

    $('#cmbCiudad').change(function () { //Al cambiar el estado del cmbCiudad se recargan las terminales
        cargarTerminales();
    });
    return false;
}, 200)); //Este retraso es porque para marcar una terminal como seleccionada, la ciudad debe estar seleccionado tambien
          //Asi que despues de 0.200 segundos tanto la ciudad como la terminal pueden seleccionarse correctamente