<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";
if ($accion == "guardar") {

    $sql = "CALL Vender_Guia_Encomienda('" . $_POST["txtVolumen"] . "','" . $_POST["txtIdEmisor"] . "','" . $_POST["txtIdReceptor"] . "','" . $_POST["checkViaje"] . "','" . $_POST["cmbTarifa"] .
           "','" . $_POST["usuarioLogin"] . "')";

    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Venta de encomienda registrada satisfactoriamente, será redireccionado al PDF de la encomienda');</script>";
    echo "<script>window.open('../../reporteria/encomiendaPDF.php?idGuia= ". $_POST["txtNoGuia"] ."', '_blank');</script>";
    echo "<script>window.history.replaceState({}, document.title, '/' + 'Proyecto/forms/encomiendas/form_venderEncomienda.php');
                  location.reload();</script>";
}
?>