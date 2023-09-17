<?php

$contrasenia = password_hash($_POST["txtClave"], PASSWORD_DEFAULT); //Encripta contraseña

$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //Recupera la accion
if ($accion == "guardar") { //Si paso las validaciones tendra el valor de guardar y sino estara vacio

    $sql = "CALL Insert_Usuario('" . $_POST["txtUsuario"] . "','" . $_POST["cmbEmpleado"] . "','" . $contrasenia . "',
    '" . $_POST["cmbTipo"] . "','" . $_POST["usuarioLogin"] . "')";
    //Inserta al usuario mediante el procedimiento almacenado y la conexion a la BD
    //echo $sql;
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Registro guardado satisfactoriamente');</script>";
    //Alerta la insercion del registro
}
?>