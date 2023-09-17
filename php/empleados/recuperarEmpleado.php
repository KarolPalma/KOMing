<?php 
    //Este php solo es usado en actualizaciones para recuperar los datos del empleado seleccionado desde la base de datos
    $id = $_GET['idEmpleado']; //Recupera la identidad del empleado que fue enviada por metodo GET desde el filtro de empleado

    //Inicializacion de variables
    $nombres = '';
    $apellidos = '';
    $nacimiento = '';
    $registro = '';
    $finalizacion = '';
    $telefono = '';
    $email = '';
    $cargo = '';
    $reportaA = '';
    $idGenero = '';
    $direccion = '';
    $idPais = '';
    $idCiudad = '';
    $idTerminal = '';
    $activo = '';

    $sql = "SELECT * FROM v_Empleado WHERE Id_Empleado = '" . $id . "';"; //Utiliza una vista en la BD creada para devolver los datos del empleado junto con su pais y ciudad (los ultimos dos mediante INNER JOIN)
    $result = mysqli_query($conexion, $sql); //Efectua la consulta
    while ($row = mysqli_fetch_assoc($result)) { //Y recorre cada registro (que en realidad solo es un registro porque los ID son unicos)
        $nombres = $row["Nombres"]; //Asigna los valores de la BD (segun nombre de columna) a las variables inicializadas arriba
        $apellidos = $row["Apellidos"];
        $nacimiento = $row["Fecha_Nacimiento"];
        $registro = $row["Fecha_Contratacion"];
        $finalizacion = $row["Fecha_Finalizacion_Contrato"];
        $telefono = $row["Telefono"];
        $email = $row["Correo"];
        $cargo = $row["Id_Cargo"];
        $reportaA = $row["Reporta_A"];
        $idGenero = $row["Id_Genero"];
        $direccion = $row["Direccion"];
        $idPais = $row["Id_Pais"];
        $idCiudad = $row["Id_Ciudad"];
        $idTerminal = $row["Id_Terminal"];
        $activo = $row["Activo"];
    }
    //Con esto y al incluir este archivo php al form de actualizacion de empleados, es posible llamar a estas variables en cada campo
?>