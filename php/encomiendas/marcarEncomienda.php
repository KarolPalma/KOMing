<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //Recupera el campo oculto de accion
if ($accion == "marcar") { //Si el form a pasado correctamente por las validaciones la accion se habra cambiado a marcar, sino estara vacia

    $sql = "CALL Marcar_Encomienda_Reclamada('" . $_POST["txtNoGuia"] . "','" . $_POST["usuarioLogin"] . "')";
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Guía reclamada satisfactoriamente');</script>";
    echo "<script>window.open('../../reporteria/encomiendaPDF.php?idGuia= ". $_POST["txtNoGuia"] ."', '_blank');</script>";
    echo "<script>
                window.location.href = '../../forms/encomiendas/form_filtroEncomienda.php';
      </script>";
    
      //Proporciona un alert informativo y redirecciona al filtro de clientes o buscador además de generar la guía de encomienda como reclamada enviandola al correo.
}
if ($accion == "noMarcar") { //Si el form a pasado correctamente por las validaciones la accion se habra cambiado a noMarcar, sino estara vacia

    $sql = "CALL Desmarcar_Encomienda_Reclamada('" . $_POST["txtNoGuia"] . "','" . $_POST["usuarioLogin"] . "')";
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Guía desmarcada satisfactoriamente');</script>";
    echo "<script>
                window.location.href = '../../forms/encomiendas/form_filtroEncomienda.php';
      </script>";
      //Proporciona un alert informativo y redirecciona al filtro de clientes o buscador
} 
?>