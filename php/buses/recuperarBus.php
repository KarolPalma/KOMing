<?php 
    //Este php solo es usado en actualizaciones para recuperar los datos del bus seleccionado desde la base de datos
    $id = $_GET['idBus']; //Recupera la identidad del bus que fue enviada por metodo GET desde el filtro de bus

    //Inicializacion de variables
    $marca = '';
    $modelo = '';
    $color = '';
    $cPersonas = '';
    $cEncomiendas = '';
    $activo = '';

    $sql = "SELECT * FROM v_Buses WHERE Id_Bus = '" . $id . "';"; //Utiliza una vista en la BD creada para devolver los datos del bus junto con su pais y depto (los ultimos dos mediante INNER JOIN)
    $result = mysqli_query($conexion, $sql); //Efectua la consulta
    while ($row = mysqli_fetch_assoc($result)) { //Y recorre cada registro (que en realidad solo es un registro porque los ID son unicos)
        $marca = $row["Marca"];
        $modelo = $row["Modelo"];
        $color = $row["Color"];
        $cPersonas = $row["Capacidad_Personas"];
        $cEncomiendas = $row["Capacidad_Encomiendas"];
        $activo = $row["Activo"];
    }
    //Con esto y al incluir este archivo php al form de actualizacion de buses, es posible llamar a estas variables en cada campo
?>