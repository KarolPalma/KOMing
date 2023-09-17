<?php
    include("../conexion.php");
    $bus = $_REQUEST['bus'];
    $fecha = $_REQUEST['fecha'];
	$hora = $_REQUEST['hora'];
    
	if($bus != ''){
		$sql = "SELECT Id_Bus, CONCAT(Marca, ', ', Modelo, ' (Capacidad: ', Capacidad_Personas, ', ', Capacidad_Encomiendas, ')') AS Descripcion 
            FROM Buses
            WHERE Activo = 1
            AND Id_Bus = '$bus'";

		$cadena = "<option value=''>-- Seleccione un Bus --</option>";
		$result = mysqli_query($conexion,$sql);
		while ($res = mysqli_fetch_row($result)) {
			if($res[0] == $bus){
				$cadena = $cadena."<option selected value = '".$res[0]."'>".$res[1]."</option>";
			} else {
				$cadena = $cadena."<option value = '".$res[0]."'>".$res[1]."</option>";
			}
		}
	}else{
		$cadena = "<option value=''>-- Seleccione un Bus --</option>";
	}


	$sql = "SELECT Id_Bus, CONCAT(Marca, ', ', Modelo, ' (Capacidad: ', Capacidad_Personas, ', ', Capacidad_Encomiendas, ')') AS Descripcion 
            FROM Buses
            WHERE Activo = 1
            AND Id_Bus NOT IN   (SELECT Id_Bus
                                FROM Viajes 
                                WHERE ((CONCAT(Fecha_Salida, ' ', Hora_Salida) <= '$fecha $hora:00') AND (CONCAT(Fecha_Llegada, ' ', Hora_Llegada) >= '$fecha $hora:00'))
                                OR Id_Estado_Viaje = 2);";

	$result = mysqli_query($conexion,$sql);
	while ($res = mysqli_fetch_row($result)) {
		if($res[0] == $bus){
			$cadena = $cadena."<option selected value = '".$res[0]."'>".$res[1]."</option>";
		} else {
			$cadena = $cadena."<option value = '".$res[0]."'>".$res[1]."</option>";
		}
	}
	echo  $cadena;
?>