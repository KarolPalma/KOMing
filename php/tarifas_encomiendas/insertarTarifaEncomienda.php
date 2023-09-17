<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //Recupera la accion
if ($accion == "guardar") { //Si paso las validaciones tendra el valor de guardar y sino estara vacio

    $sql = "CALL Insert_Tarifa_Encomienda('" . $_POST["txtVolumen"] . "','" . $_POST["txtDescripcion"] . "','" . $_POST["cmbTerminalOrigen"] . "','" . $_POST["cmbTerminalDestino"] .
           "','" . $_POST["txtPrecio"] . "','" . ($_POST["txtPorcentaje"]/100) . "','"  . $_POST["usuarioLogin"] . "')";
    //echo "sql ".$sql;
    //Inserta la tarifa mediante el procedimiento almacenado y la conexion a la BD
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Registro guardado satisfactoriamente');</script>";
    //Alerta la insercion del registro
}
?>