<?php 

    $id = $_GET['idGuia'];

    //Inicializacion de variables
    $idGuia = '';
    $volumen = '';
    $fechaEnvio = '';
    $horaEnvio = '';
    $idEmpleado = '';
    $idEmisor = '';
    $nombreEmisor = '';
    $correoEmisor = '';
    $idReceptor = '';
    $nombreReceptor = '';
    $correoReceptor = '';
    $idViaje = '';
    $idPaisOrigen = '';
    $nombrePaisOrigen = '';
    $idCiudadOrigen = '';
    $nombreCiudadOrigen = '';
    $idTerminalOrigen = '';
    $nombreTerminalOrigen = '';
    $idPaisDestino = '';
    $nombrePaisDestino = '';
    $idCiudadDestino = '';
    $nombreCiudadDestino = '';
    $idTerminalDestino = '';
    $nombreTerminalDestino = '';
    $fechaSalida = '';
    $horaSalida = '';
    $fechaLlegada = '';
    $horaLLegada = '';
    $idBus = '';
    $idTarifa = '';
    $precio = '';
    $reclamada = '';

    $sql = "SELECT * FROM v_Encomienda WHERE Id_Guia = '" . $id . "';"; 
    $result = mysqli_query($conexion, $sql); 
    while ($row = mysqli_fetch_assoc($result)) { 
        $idGuia = $row["Id_Guia"];
        $volumen = $row["Volumen"]; 
        $fechaEnvio = $row["Fecha_Envio"]; 
        $horaEnvio = $row["Hora_Envio"]; 
        $idEmpleado = $row["Id_Empleado"]; 
        $idEmisor = $row["Id_Emisor"]; 
        $nombreEmisor = $row["Nombre_Emisor"]; 
        $correoEmisor = $row["Correo_Emisor"]; 
        $idReceptor = $row["Id_Receptor"]; 
        $nombreReceptor = $row["Nombre_Receptor"]; 
        $correoReceptor = $row["Correo_Receptor"];
        $idViaje = $row["Id_Viaje"]; 
        $idPaisOrigen = $row["Id_Pais_Origen"]; 
        $nombrePaisOrigen = $row["Nombre_Pais_Origen"]; 
        $idCiudadOrigen = $row["Id_Ciudad_Origen"]; 
        $nombreCiudadOrigen = $row["Nombre_Ciudad_Origen"]; 
        $idTerminalOrigen = $row["Id_Terminal_Origen"]; 
        $nombreTerminalOrigen = $row["Nombre_Terminal_Origen"]; 
        $idPaisDestino = $row["Id_Pais_Destino"]; 
        $nombrePaisDestino = $row["Nombre_Pais_Destino"]; 
        $idCiudadDestino = $row["Id_Ciudad_Destino"]; 
        $nombreCiudadDestino = $row["Nombre_Ciudad_Destino"]; 
        $idTerminalDestino = $row["Id_Terminal_Destino"]; 
        $nombreTerminalDestino = $row["Nombre_Terminal_Destino"]; 
        $fechaSalida = $row["Fecha_Salida"]; 
        $horaSalida = $row["Hora_Salida"]; 
        $fechaLlegada = $row["Fecha_Llegada"]; 
        $horaLLegada = $row["Hora_Llegada"]; 
        $idBus = $row["Id_Bus"]; 
        $idTarifa = $row["Id_Tarifa"]; 
        $precio = $row["Precio"]; 
        $reclamada = $row["Reclamada"]; 
    }
    //Con esto y al incluir este archivo php al form de ver encomienda, es posible llamar a estas variables en cada campo
?>