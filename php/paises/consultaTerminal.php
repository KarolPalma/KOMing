<?php 
    include("../conexion.php"); //Llama a la conexion a la BD
    $ciudad = $_REQUEST['ciudad']; //Recibe el id de la ciudad seleccionado para rellenar el combobox de ciudades mediante un registro JSON
	$idTerminal = $_REQUEST['terminal']; //Recibe el id de la terminal (en caso de ser una actualizacion) para marcar esa terminal como seleccionada
    
	$sql = "SELECT Id_Terminal, Nombre_Terminal FROM Terminales WHERE Id_Ciudad = '$ciudad'"; //Consulta a la BD

	$result = mysqli_query($conexion,$sql); //Realizacion de la consulta

	$cadena = "<option value=''>-- Seleccione una Terminal --</option>"; //Imprimir el valor por defecto

	while ($res = mysqli_fetch_row($result)) { //Recorrer los registros
		if($res[0] == $idTerminal){ //Si el id pasado como JSON desde el Ajax es igual al id en el registro actual, marca como seleccionado este option
			$cadena = $cadena."<option selected value = '".$res[0]."'>".$res[1]."</option>";
		} else { //Si no lo imprime como un option normal
			$cadena = $cadena."<option value = '".$res[0]."'>".$res[1]."</option>";
		}
	}
	echo  $cadena;
	//Devuelve la cadena de HTML al AJAX que la incorporara en el combobox o select especificado en la funcion
?>






