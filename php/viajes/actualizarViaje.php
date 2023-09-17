<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";
$numViaje = isset($_POST["numViaje"]) ? $_POST["numViaje"] : "";
if ($accion == "guardar") { 

    $sql = "CALL Update_Viaje('" . $_POST["txtNoViaje"] . "','" . $_POST["cmbChofer"] . "','" . $_POST["cmbBus"] .
           "','" . $_POST["cmbEstado"] . "','" . $_POST["usuarioLogin"] . "')";
    
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Registro actualizado satisfactoriamente');</script>";
    echo "<script>alert('Es recomendable que informe a los clientes que viajan en este viaje sobre los cambios realizados');</script>";
    echo "<script>
                window.location.href = '../../forms/viajes/form_filtroViaje.php';
      </script>";
      //Proporciona un alert informativo y redirecciona al filtro de clientes o buscador
} 

if ($accion == "generar") { //Si el boton presionado fue el de desactivacion la accion sera desactivar
    echo "<script>window.open('../../reporteria/viajePDF.php?idViaje= ". $_POST["txtNoViaje"] ."', '_blank');</script>";
}else if($accion == "generarReporte"){
    echo "<script>window.open('../../reporteria/viajePDF.php?idViaje= ". $numViaje ."', '_blank');</script>";   
}
?>