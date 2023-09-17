<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //Recupera el campo oculto de accion
if ($accion == "guardar") { //Si el form a pasado correctamente por las validaciones la accion se habra cambiado a guardar, sino estara vacia

    $sql = "CALL Update_Boleto('" . $_POST["txtNoBoleto"] . "','" . $_POST["txtReservaAsiento"] . "','" . $_POST["usuarioLogin"] . "')";
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Reservación de asiento actualizado satisfactoriamente');</script>";
    echo "<script>window.open('../../reporteria/boletoPDF.php?idBoleto= ". $_POST["txtNoBoleto"] ."&Actualizado=1', '_blank');</script>";
    echo "<script>
                window.location.href = '../../forms/boletos/form_filtroBoleto.php';
      </script>";
      //Proporciona un alert informativo y redirecciona al filtro de clientes o buscador
}
?>