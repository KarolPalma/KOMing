<?php
$accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //Recupera el campo oculto de accion
if ($accion == "guardar") { //Si el form a pasado correctamente por las validaciones la accion se habra cambiado a guardar, sino estara vacia

    $sql = "CALL Update_Tarifa_Encomienda('" . $_POST["txtNoTarifa"] . "','" . $_POST["txtDescripcion"] . "','" . $_POST["txtPrecio"] .
           "','" . ($_POST["txtPorcentaje"]/100) . "','" . $_POST["usuarioLogin"] . "')";
    //Llama al procedimiento almacenado y le pasa todos los valores requeridos
    $resultado = mysqli_query($conexion, $sql);
    //echo "sql actualizar ".$sql;
    echo "<script>alert('Registro actualizado satisfactoriamente');</script>";
    echo "<script>
                window.location.href = '../../forms/tarifas_encomiendas/form_filtroTarifaEncomienda.php';
      </script>";
      //Proporciona un alert informativo y redirecciona al filtro de clientes o buscador
} 

if ($accion == "desactivar") { //Si el boton presionado fue el de desactivacion la accion sera desactivar

    $sql = "CALL Deactivate_Tarifa_Encomienda('" . $_POST["txtNoTarifa"] . "','" . $_POST["usuarioLogin"] . "')";
    $resultado = mysqli_query($conexion, $sql);
    echo "<script>alert('Registro desactivado satisfactoriamente');</script>";
    echo "<script>
                window.location.href = '../../forms/tarifas_encomiendas/form_filtroTarifaEncomienda.php';
      </script>";
      //Para alertar la desactivacion satisfactoria y redireccionar al buscador
}
?>