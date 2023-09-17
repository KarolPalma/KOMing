<?php 
    include("../conexion.php"); //Llama a la conexion a la BD
    
	$cadena = "<option value=''>-- Seleccione una Terminal --</option>"; //Imprimir el valor por defecto

	echo  $cadena;
	//Devuelve la cadena de HTML al AJAX que la incorporara en el combobox o select especificado en la funcion
?>
