<?php 
    //Este php solo es usado en actualizaciones para recuperar los datos del cliente seleccionado desde la base de datos
    $id = $_GET['idTarifaEncomienda']; //Recupera la identidad del cliente que fue enviada por metodo GET desde el filtro de cliente

    //Inicializacion de variables
    $descripcion = '';
    $paisOrigen = '';
    $ciudadOrigen = '';
    $terminalOrigen = '';
    $paisDestino = '';
    $ciudadDestino = '';
    $terminalDestino = '';
    $precio = '';
    $porcentaje = '';
    $activo = '';
    if($id%2 != 0){
        $sql = "SELECT * FROM v_Tarifas_Encomiendas WHERE Id_Tarifa = '" . $id . "';";
        $result = mysqli_query($conexion, $sql); //Efectua la consulta
        while ($row = mysqli_fetch_assoc($result)) { //Y recorre cada registro (que en realidad solo es un registro porque los ID son unicos)
            $descripcion = $row["Descripcion"]; //Asigna los valores de la BD (segun nombre de columna) a las variables inicializadas arriba
            $paisOrigen = $row["Id_Pais_Origen"];
            $ciudadOrigen = $row["Id_Ciudad_Origen"];
            $terminalOrigen = $row["Id_Terminal_Origen"];
            $paisDestino = $row["Id_Pais_Destino"];
            $ciudadDestino = $row["Id_Ciudad_Destino"];
            $terminalDestino = $row["Id_Terminal_Destino"];
            $precio = $row["Precio"];
            $porcentaje = ($row["Porcentaje_Reajuste"] * 100);
            $activo = $row["Activo"];
        }
    }else{
        echo "<script>window.location.href = 'form_filtroTarifaEncomienda.php'</script>";
    }
    //Con esto y al incluir este archivo php al form de actualizacion de clientes, es posible llamar a estas variables en cada campo
?>