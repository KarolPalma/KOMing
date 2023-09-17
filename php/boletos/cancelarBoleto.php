<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //Recupera el campo oculto de accion
if ($accion == "cancelar") { //Si el form a pasado correctamente por las validaciones la accion se habra cambiado a cancelar, sino estara vacia

    $sql = "CALL Boleto_Cancelado('" . $_POST["txtNoBoleto"] . "','" . $_POST["usuarioLogin"] . "')";
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Boleto cancelado satisfactoriamente');</script>";
    echo "<script>window.open('../../reporteria/boletoPDF.php?idBoleto= ". $_POST["txtNoBoleto"] ."&Actualizado=0', '_blank');</script>";
    echo "<script>
                window.location.href = '../../forms/boletos/form_filtroBoleto.php';
      </script>";
      //Proporciona un alert informativo y redireccisona al filtro de clientes o buscador
}

?>