<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";
if ($accion == "guardar") { 

    $sql = "CALL Insert_Viaje('" . $_POST["txtFechaSalida"] . "','" . $_POST["txtHoraSalida"] . "','" . $_POST["txtFechaLlegada"] .
           "','" . $_POST["txtHoraLlegada"] . "','" . $_POST["cmbTerminalOrigen"] . "','" . $_POST["cmbTerminalDestino"] . "','" .
           $_POST["cmbChofer"] . "','" . $_POST["cmbBus"] . "','" . $_POST["cmbEstado"] . "','" . $_POST["usuarioLogin"] . "')";
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Registro guardado satisfactoriamente');</script>";
}
?>