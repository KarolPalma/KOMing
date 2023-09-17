<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
//Incluye el archivo php con la libreria de Bootstrap y el menú del sistema
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
include("../../php/boletos/insertarBoleto.php");
//Incluye el archivo php que inserta los datos a la BD cuando se cambia el campo de "accion" al valor de guardar
date_default_timezone_set('America/El_Salvador');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../../css/reservaAsiento.css" media="screen" />
    <title>Vender Boleto - KOMing</title>
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <!--Libreria básica de JQuery-->
    <script src="../../js/boletos/boletos.js"></script>
    <!--Script de validación de campos-->
    <script src="../../js/paises/paisesOrigenDestino.js"></script>
    <!--Script de actualización en tiempo real de selects de ciudades y terminales-->
    <script src="../../js/boletos/cargarPrecioTarifa.js"></script>
</head>

<body>
    <div class="container">
        <div class="col-12 text-center mt-5 mb-5">
            <!--Bootstrap: Centrado de Texto y margenes arriba y abajo-->
            <h3 style="background-color: #3987E3; color: white;">Vender Boleto</h3>
        </div>
        <form name='formulario' id='formulario' method='POST' action="">
            <input type="hidden" name="accion" id="accion" value="">
            <!--Modificar usuario a POST cuando se tenga la variable de sesion de usuario (luego del login)-->
            <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'"?>>
            <div class="col-12">
                <div class="row">
                    <!--Bootstrap: Divide en filas la pagina-->
                    <?php //$sql = "SELECT (COUNT(*) + 1) AS C FROM Boletos";
                    $sql = "SELECT (Id_Boleto + 1) AS C FROM boletos ORDER by Id_Boleto DESC LIMIT 1";
                    $noBoleto = 0;
                    $result = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $noBoleto = $row["C"];
                    } ?>
                    <!--No.Boleto-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                        <div class="form-group mt-2 mb-2">
                            <!--Bootstrap: Aplica CSS al label e input, añade margen arriba y abajo-->
                            <label for="txtNoBoleto" class="form-label">No. Boleto</label>
                            <input type="number" class="form-control" name="txtNoBoleto" id="txtNoBoleto" maxlength="45" <?php echo "value='$noBoleto'" ?> readonly>
                        </div>
                    </div>
                    <!--Fecha Compra-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtFechaCompra" class="form-label">Fecha de Compra</label>
                            <input type="date" class="form-control" name="txtFechaCompra" id="txtFechaCompra" value="<?php echo date('Y-m-d'); ?>" readonly />
                        </div>
                    </div>
                    <!--Hora Compra-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtHoraCompra" class="form-label">Hora Compra</label>
                            <input type="time" class="form-control" name="txtHoraCompra" id="txtHoraCompra" value="<?php echo date('H:i:s', time()); ?>" readonly>
                        </div>
                    </div>
                    <!--Empleado-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <!--Modificar usuario a POST cuando se tenga la variable de sesion de usuario (luego del login)-->
                            <label for="txtEmpleado" class="form-label">Empleado que Atendió</label>
                            <select class="form-control" name="txtEmpleado" id="txtEmpleado" disabled>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Empleado, CONCAT(Nombres, ' ', Apellidos) AS Nombre FROM Empleados WHERE Id_Empleado = 
                                        (SELECT Id_Empleado FROM Usuarios WHERE Id_Usuario = '" .$_SESSION["idUsuario"] . "')";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['Id_Empleado'] . "'>" . $row['Nombre'] . "</option>";
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <!--No. Identidad-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtIdentidad" class="form-label">No. Identidad del Cliente</label>
                            <input type="text" class="form-control" name="txtIdentidad" id="txtIdentidad" placeholder="Ingrese el número de identidad del cliente" <?php echo 'value="' . $_POST['txtIdentidad'] . '"' ?>>
                        </div>
                    </div>
                    <!--Fecha Filtro-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtFechaFiltro" class="form-label">Fecha de Viaje Estimada (Opcional)</label>
                            <input type="date" class="form-control" name="txtFechaFiltro" id="txtFechaFiltro" min="<?php echo date('Y-m-d'); ?>" <?php echo 'value="' . $_POST['txtFechaFiltro'] . '"' ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-3 mb-2">
                            <label class="form-label" style="font-weight: bold;">Especificaciones del Viaje</label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                    <!--Pais Origen-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbPaisOrigen" class="form-label">País de Origen</label>
                            <select class="form-control" name="cmbPaisOrigen" id="cmbPaisOrigen">
                                <option value="">-- Seleccione un País --</option>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Pais, Nombre_Pais FROM Paises";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['Id_Pais'] == $_POST['cmbPaisOrigen']) { //Si el id de la respuesta concuerda con el id de recuperarCliente.php, lo setea como seleccionado
                                        echo "<option selected value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                    } else { //Y si no, lo imprime como no seleccionado
                                        echo "<option value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                    }
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="ciudadOrigen" id="ciudadOrigen" <?php echo 'value=' . $_POST['cmbCiudadOrigen'] ?>>
                    <input type="hidden" name="terminalOrigen" id="terminalOrigen" <?php echo 'value=' . $_POST['cmbTerminalOrigen'] ?>>
                    <!--Ciudad Origen-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="ciudad">
                            <label for='cmbCiudadOrigen' class='form-label'>Ciudad de Origen</label>
                            <select class='form-control' name='cmbCiudadOrigen' id='cmbCiudadOrigen'>
                                <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarCiudades()-->
                            </select>
                        </div>
                    </div>
                    <!--Terminal Origen-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="terminal">
                            <label for='cmbTerminalOrigen' class='form-label'>Terminal de Origen</label>
                            <select class='form-control' name='cmbTerminalOrigen' id='cmbTerminalOrigen'>
                                <!--Se rellena mediante scrip paisesOrigenDestino.js, funcion cargarTerminales()-->
                            </select>
                        </div>
                    </div>

                    <!--Pais Destino-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbPaisDestino" class="form-label">País de Destino</label>
                            <select class="form-control" name="cmbPaisDestino" id="cmbPaisDestino">
                                <option value="">-- Seleccione un País --</option>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Pais, Nombre_Pais FROM Paises";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['Id_Pais'] == $_POST['cmbPaisDestino']) { //Si el id de la respuesta concuerda con el id de recuperarCliente.php, lo setea como seleccionado
                                        echo "<option selected value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                    } else { //Y si no, lo imprime como no seleccionado
                                        echo "<option value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                    }
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="ciudadDestino" id="ciudadDestino" <?php echo 'value=' . $_POST['cmbCiudadDestino'] ?>>
                    <input type="hidden" name="terminalDestino" id="terminalDestino" <?php echo 'value=' . $_POST['cmbTerminalDestino'] ?>>
                    <!--Ciudad Destino-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="ciudad">
                            <label for='cmbCiudadDestino' class='form-label'>Ciudad de Destino</label>
                            <select class='form-control' name='cmbCiudadDestino' id='cmbCiudadDestino'>
                                <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarCiudades()-->
                            </select>
                        </div>
                    </div>
                    <!--Terminal Destino-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="terminal">
                            <label for='cmbTerminalDestino' class='form-label'>Terminal de Destino</label>
                            <select class='form-control' name='cmbTerminalDestino' id='cmbTerminalDestino'>
                                <!--Se rellena mediante scrip paisesOrigenDestino.js, funcion cargarTerminales()-->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <button onClick="return revisarOrigenDestino()" name="btnFiltrar" id="btnFiltrar" class="btn btn-primary m-5" style="background-color: #3987E3; border-color: #3987E3;">Buscar Viajes</button>
                            <!--El boton llama a la funcion de revision donde si las validaciones son correctas se hará el submit-->
                        </div>
                    </div>

                    <!------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="d-flex justify-content-center my-4">
                        <table id='tabla' class="table table-striped table-bordered" style="max-width: 1100px;">
                            <!--Bootstrap: Estilo de tabla-->
                            <?php
                            $accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //La accion que cambia con la funcion validar()
                            $fecha = isset($_POST["txtFechaFiltro"]) ? $_POST["txtFechaFiltro"] : "";
                            $origen = isset($_POST["cmbTerminalOrigen"]) ? $_POST["cmbTerminalOrigen"] : "";
                            $destino = isset($_POST["cmbTerminalDestino"]) ? $_POST["cmbTerminalDestino"] : "";
                            if ($accion == "consultar" && $fecha != "") {
                                $sql = "SELECT * FROM v_Viaje_Compra_Boletos
                                        WHERE Id_Terminal_Origen = " . $origen . " AND Id_Terminal_Destino = " . $destino . "
                                        AND CONVERT(Fecha_Salida, DATE) = CONVERT('" . $fecha . "', DATE)";
                                $result = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                                    echo
                                    "<thead>
                                    <tr>
                                    <th scope='col' style='text-align: center;'>Elegir</th>
                                    <th scope='col' style='text-align: center;'>Fecha de Salida</th>
                                    <th scope='col' style='text-align: center;'>Hora de Salida</th>
                                    <th scope='col' style='text-align: center;'>Terminal de Origen</th>
                                    <th scope='col' style='text-align: center;'>Terminal de Destino</th>
                                    <th scope='col' style='text-align: center;'>Placa del Bus</th>
                                    <th scope='col' style='text-align: center;'>Cupos Disponibles</th>
                                    </tr>
                                    </thead>
                                    <tbody>";

                                    while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                                        echo
                                        "<tr>
                                        <th scope='row' style='text-align: center;'>
                                            <input class='form-check-input' onClick='opViajeSeleccionado()' type='radio' name='checkViaje' id='checkViaje' value='" . $row["Id_Viaje"] . "'>
                                        </th>
                                        <td scope='row' style='text-align: center;'>" . date('d-m-Y', strtotime($row["Fecha_Salida"])) . "</td>
                                        <td scope='row' style='text-align: center;'>" . date('h:i a', strtotime($row["Hora_Salida"])) . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Origen"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Destino"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Id_Bus"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Cupos_Boletos"] . "</td>
                                        </tr>";
                                    }
                                }
                                echo "</table>";

                                if (mysqli_num_rows($result) == 0) {
                                    echo
                                    "<div class='col-12 text-center mt-5 mb-5'>
                                        <p>No se encontraron resultados</p>
                                    </div>";
                                }
                            } else if ($accion == "consultar") { //Si solo se hace una consulta de viajes
                                $sql = "SELECT * FROM v_Viaje_Compra_Boletos
                                        WHERE Id_Terminal_Origen = " . $origen . " AND Id_Terminal_Destino = " . $destino;
                                $result = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($result) != 0) {
                                    echo
                                    "<thead>
                                    <tr>
                                    <th scope='col' style='text-align: center;'>Elegir</th>
                                    <th scope='col' style='text-align: center;'>Fecha de Salida</th>
                                    <th scope='col' style='text-align: center;'>Hora de Salida</th>
                                    <th scope='col' style='text-align: center;'>Terminal de Origen</th>
                                    <th scope='col' style='text-align: center;'>Terminal de Destino</th>
                                    <th scope='col' style='text-align: center;'>Placa del Bus</th>
                                    <th scope='col' style='text-align: center;'>Cupos Disponibles</th>
                                    </tr>
                                    </thead>
                                    <tbody>";

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo
                                        "<tr>
                                        <th scope='row' style='text-align: center;'>
                                            <input class='form-check-input' onClick='opViajeSeleccionado()' type='radio' name='checkViaje' id='checkViaje' value='" . $row["Id_Viaje"] . "'>
                                        </th>
                                        <td scope='row' style='text-align: center;'>" . date('d-m-Y', strtotime($row["Fecha_Salida"])) . "</td>
                                        <td scope='row' style='text-align: center;'>" . date('h:i a', strtotime($row["Hora_Salida"])) . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Origen"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Destino"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Id_Bus"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Cupos_Boletos"] . "</td>
                                        </tr>";
                                    }
                                }
                                echo "</table>";

                                if (mysqli_num_rows($result) == 0) {
                                    echo
                                    "<div class='col-12 text-center mt-5 mb-5'>
                                        <p>No se encontraron resultados</p>
                                    </div>";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!------------------------------------------------------------------------------------------------------------------------------------->
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Reservación de Asientos-->
                    <input type='hidden' name='txtReservaAsiento' id='txtReservaAsiento'  value=''>
                    <div class="d-flex justify-content-center my-4" id="mostrarReservacion" name="mostrarReservacion">
                        <!--Muestra la tabla de reserva asiento de mostrarReservaAsiento.php-->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>

                    <div class="d-flex justify-content-center my-4" id="tablaInfo" name="tablaInfo">
                        <!--Muestra la tabla de informativa de reserevación de asiento-->
                    </div>

                    <!--Tarifa-->
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                        <?php
                            if ($accion == "consultar" && mysqli_num_rows($result) != 0) {
                                echo "<label for='cmbTarifa' class='form-label'>Tipo de Tarifa</label>";
                                echo "<select class='form-control' name='cmbTarifa' id='cmbTarifa'>";
                                    echo "<option value=''>-- Seleccione una Tarifa --</option>";
                                    $sql = "SELECT Id_Tarifa FROM Tarifas_Boletos WHERE Id_Terminal_Origen = " . $_POST["cmbTerminalOrigen"] . "
                                            AND Id_Terminal_Destino = " . $_POST["cmbTerminalDestino"] . " AND Activo = 1";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if (($row['Id_Tarifa'] % 2) != 0) {
                                            echo "<option value='" . $row['Id_Tarifa'] . "'>Tarifa Normal</option>";
                                        } else if (($row['Id_Tarifa'] % 2) == 0) {
                                            echo "<option value='" . $row['Id_Tarifa'] . "'>Tarifa de Reajuste</option>";
                                        }
                                    }
                                    if (mysqli_num_rows($result) == 0) {
                                        echo "<option value='>-- Sin Tarifas Activas --</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                            
                        </div>
                    </div>

                    <!--Precio-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                        <?php
                        if ($accion == "consultar" && mysqli_num_rows($result) != 0) {
                            echo "<label for='txtPrecio' class='form-label'>Precio</label>";
                            echo "<div class='form-inline'>";
                                echo "<p style='float: left; margin-top: 6px;'>$.</p>";
                                echo "<p style='float: left; width: 20px;'></p>";
                                echo "<input type='number' class='form-control' style='max-width: 380px; float: left;' name='txtPrecio' id='txtPrecio' value='0' min='0' step='0.01' readonly>";
                            echo "</div>";
                        }
                        ?>
                        </div>
                    </div>

                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <button name="btnLimpiar" id="btnLimpiar" class="btn btn-secondary m-5">Limpiar</button>
                            <button onClick="return revisarIdentidad()" name="btnGuardar" id="btnGuardar" class="btn btn-primary m-5" style="background-color: #3987E3; border-color: #3987E3;">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="py-5" style="background-color: #24242c;">
        <div class="container">
        </div>
    </footer>
</body>

</html>