<?php 

    $id = $_GET['idBoleto'];

    //Inicializacion de variables
    $fechaCompra = '';
    $horaCompra = '';
    $idEmpleado = '';
    $idCliente = '';
    $nombre = '';
    $correo = '';
    $idViaje = '';
    $paisOrigen = '';
    $ciudadOrigen = '';
    $terminalOrigen = '';
    $paisDestino = '';
    $ciudadDestino = '';
    $terminalDestino = '';
    $nombrePaisOrigen = '';
    $nombreCiudadOrigen = '';
    $nombreTerminalOrigen = '';
    $nombrePaisDestino = '';
    $nombreCiudadDestino = '';
    $nombreTerminalDestino = '';
    $numReservaAsiento = '';
    $fechaSalida = '';
    $horaSalida = '';
    $idBus = '';
    $idTarifa = '';
    $precio = '';

    $sql = "SELECT * FROM v_Boleto WHERE Id_Boleto = '" . $id . "';"; 
    $result = mysqli_query($conexion, $sql); 
    while ($row = mysqli_fetch_assoc($result)) { 
        $fechaCompra = $row["Fecha_Compra"]; 
        $horaCompra = $row["Hora_Compra"];
        $idEmpleado = $row["Id_Empleado"];
        $idCliente = $row["Id_Cliente"];
        $nombre = $row["Nombre"];
        $correo = $row["Correo"];
        $idViaje = $row["Id_Viaje"];
        $paisOrigen = $row["Id_Pais_Origen"];
        $ciudadOrigen = $row["Id_Ciudad_Origen"];
        $terminalOrigen = $row["Id_Terminal_Origen"];
        $paisDestino = $row["Id_Pais_Destino"];
        $ciudadDestino = $row["Id_Ciudad_Destino"];
        $terminalDestino = $row["Id_Terminal_Destino"];
        $nombrePaisOrigen = $row["Nombre_Pais_Origen"];
        $nombreCiudadOrigen = $row["Nombre_Ciudad_Origen"];
        $nombreTerminalOrigen = $row["Nombre_Terminal_Origen"];
        $nombrePaisDestino = $row["Nombre_Pais_Destino"];
        $nombreCiudadDestino = $row["Nombre_Ciudad_Destino"];
        $nombreTerminalDestino = $row["Nombre_Terminal_Destino"]; 
        $numReservaAsiento = $row["Numero_Asiento"];
        $fechaSalida = $row["Fecha_Salida"];
        $horaSalida = $row["Hora_Salida"];
        $idBus = $row["Id_Bus"];;
        $idTarifa = $row["Id_Tarifa"];
        $precio = $row["Precio"];
    }
    //Con esto y al incluir este archivo php al form de actualizacion de boletos, es posible llamar a estas variables en cada campo
?>