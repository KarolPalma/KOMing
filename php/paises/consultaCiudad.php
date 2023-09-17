<?php 
    //Recibe el id del pais seleccionado para rellenar el combobox de ciudades y cumple la misma funcion que consultaTerminal.php
	//Solo que usando pais y ciudades
    include("../conexion.php");
    $pais = $_REQUEST['pais'];
	$idCiudad = $_REQUEST['ciudad'];
    
	$sql = "SELECT Id_Ciudad, Nombre_Ciudad FROM Ciudades WHERE Id_Pais = '$pais'";

	$result = mysqli_query($conexion,$sql);

	$cadena = "<option value=''>-- Seleccione una Ciudad --</option>";

	while ($res = mysqli_fetch_row($result)) {
		if($res[0] == $idCiudad){
			$cadena = $cadena."<option selected value = '".$res[0]."'>".$res[1]."</option>";
		} else {
			$cadena = $cadena."<option value = '".$res[0]."'>".$res[1]."</option>";
		}
	}
	echo  $cadena;
?>