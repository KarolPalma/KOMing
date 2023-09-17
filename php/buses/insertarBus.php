<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //Recupera la accion
if ($accion == "guardar") { //Si paso las validaciones tendra el valor de guardar y sino estara vacio

    $sql = "CALL Insert_Bus('" . $_POST["txtID"] . "','" . $_POST["txtMarca"] . "','" . $_POST["txtModelo"] .
           "','" . $_POST["txtColor"] . "','" . $_POST["txtCPersonas"] . "','" . $_POST["txtCEncomiendas"] . "','" . $_POST["usuarioLogin"] . "')";
    //Inserta al Bus mediante el procedimiento almacenado y la conexion a la BD
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Registro guardado satisfactoriamente');</script>";
    //Alerta la insercion del registro
}
?>