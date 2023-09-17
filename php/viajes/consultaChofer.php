<?php
    include("../conexion.php");
    $chofer = $_REQUEST['chofer'];
    $fecha = $_REQUEST['fecha'];
	$hora = $_REQUEST['hora'];
    
	if($chofer != ''){
		$sql = "SELECT Id_Empleado, CONCAT(Nombres, ' ', Apellidos) AS Nombre 
		FROM Empleados
		WHERE Activo = 1 AND Id_Cargo = 2
		AND Id_Empleado = '$chofer'";

		$cadena = "<option value=''>-- Seleccione un Chofer --</option>";

		$result = mysqli_query($conexion,$sql);
		while ($res = mysqli_fetch_row($result)) {
			if($res[0] == $chofer){
				$cadena = $cadena."<option selected value = '".$res[0]."'>".$res[1]."</option>";
			} else {
				$cadena = $cadena."<option value = '".$res[0]."'>".$res[1]."</option>";
			}
		}
	}else{
		$cadena = "<option value=''>-- Seleccione un Chofer --</option>";
	}

	$sql = "SELECT Id_Empleado, CONCAT(Nombres, ' ', Apellidos) AS Nombre 
            FROM Empleados
            WHERE Activo = 1 AND Id_Cargo = 2
            AND Id_Empleado NOT IN (SELECT Id_Chofer
                                    FROM Viajes 
                                    WHERE ((CONCAT(Fecha_Salida, ' ', Hora_Salida) <= '$fecha $hora:00') AND (CONCAT(Fecha_Llegada, ' ', Hora_Llegada) > '$fecha $hora:00'))
                                    OR Id_Estado_Viaje = 2);";

	$result = mysqli_query($conexion,$sql);

	while ($res = mysqli_fetch_row($result)) {
		if($res[0] == $chofer){
			$cadena = $cadena."<option selected value = '".$res[0]."'>".$res[1]."</option>";
		} else {
			$cadena = $cadena."<option value = '".$res[0]."'>".$res[1]."</option>";
		}
	}
	echo  $cadena;
?>