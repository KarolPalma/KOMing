<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
//Incluye el archivo php con la libreria de Bootstrap y el menú del sistema
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
include("../../php/boletos/recuperarBoleto.php");
include("../../php/boletos/consultarBoleto.php");
include("../../php/boletos/cancelarBoleto.php");
include("../../php/boletos/actualizarAsiento.php");
date_default_timezone_set('America/El_Salvador');
if (($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) || ($_SESSION["admin"] == 0 || $_SESSION["cargo"] == 1)) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../../css/reservaAsiento.css" media="screen" />
        <title>Ver Boleto - KOMing</title>
        <script src="../../js/jquery-1.10.2.min.js"></script>
        <script src="../../recursos/moments.js"></script>
        <!--Libreria básica de JQuery-->
        <script src="../../js/boletos/boletos.js"></script>
        <script src="../../js/paises/paisesOrigenDestino.js"></script>
        <script>
            function generar() {
                document.getElementById("accion").value = "generar";
                document.getElementById("formulario").submit();
                return false;
            }
            function cancelar() {
                if(confirm("¿Desea cancelar la reservación del boleto?")){ //Confirmacion de cancelación de reservación verdadera (Ok)
                    document.getElementById("accion").value = "cancelar"; //Al actualizar este valor y hacer el submit puede realizarse la operacion de desactivacion en BD
                    document.getElementById("formulario").submit();
                }
                return false;
            }
        </script>
    </head>

    <body>
        <div class="container">
            <div class="col-12 text-center mt-5 mb-5">
                <!--Bootstrap: Centrado de Texto y margenes arriba y abajo-->
                <h3 style="background-color: #3987E3; color: white;">Ver Boleto</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action="">
                <input type="hidden" name="accion" id="accion" value="">
                <!--Modificar usuario a POST cuando se tenga la variable de sesion de usuario (luego del login)-->
                <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'" ?>>
                <div class="col-12">
                    <div class="row">
                        <!--No.Boleto-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                            <div class="form-group mt-2 mb-2">
                                <!--Bootstrap: Aplica CSS al label e input, añade margen arriba y abajo-->
                                <label for="txtNoBoleto" class="form-label">No. Boleto</label>
                                <input type="number" class="form-control" name="txtNoBoleto" id="txtNoBoleto" maxlength="45" <?php echo "value='" . $_GET['idBoleto'] . "'" ?> readonly>
                            </div>
                        </div>
                        <!--Fecha Compra-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtFechaCompra" class="form-label">Fecha de Compra</label>
                                <input type="date" class="form-control" name="txtFechaCompra" id="txtFechaCompra" <?php echo 'value="' . $fechaCompra . '"' ?> readonly>
                            </div>
                        </div>
                        <!--Hora Compra-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtHoraCompra" class="form-label">Hora Compra</label>
                                <input type="time" class="form-control" name="txtHoraCompra" id="txtHoraCompra" <?php echo 'value="' . $horaCompra . '"' ?> readonly>
                            </div>
                        </div>
                        <!--Empleado-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtEmpleado" class="form-label">Empleado que Atendió</label>
                                <select class="form-control" name="txtEmpleado" id="txtEmpleado" disabled>
                                    <!--Rellenado mediante BD-->
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                    <?php
                                    $sql = "SELECT Id_Empleado, CONCAT(Nombres, ' ', Apellidos) AS Nombre FROM Empleados WHERE Id_Empleado = '$idEmpleado'";
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
                                <input type="text" class="form-control" name="txtIdentidad" id="txtIdentidad" placeholder="Ingrese el número de identidad del cliente" <?php echo 'value="' . $idCliente . '"' ?> readonly>
                            </div>
                        </div>
                        <!--Nombre Cliente-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtNombre" class="form-label">Nombre del Cliente</label>
                                <select class="form-control" name="txtNombre" id="txtNombre" disabled>
                                    <!--Rellenado mediante BD-->
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                    <?php
                                    $sql = "SELECT Id_Cliente, CONCAT(Nombres, ' ', Apellidos) AS Nombre FROM Clientes WHERE Id_Cliente = '$idCliente'";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['Id_Cliente'] . "'>" . $row['Nombre'] . "</option>";
                                    }
                                    ?>
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                </select>
                            </div>
                        </div>
                        <!--Pais Origen-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="cmbPaisOrigen" class="form-label">País de Origen</label>
                                <select disabled class="form-control" name="cmbPaisOrigen" id="cmbPaisOrigen">
                                    <option value="">-- Seleccione un País --</option>
                                    <!--Rellenado mediante BD-->
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                    <?php
                                    $sql = "SELECT Id_Pais, Nombre_Pais FROM Paises";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['Id_Pais'] == $paisOrigen) {
                                            echo "<option selected value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                        }
                                    }
                                    ?>
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="ciudadOrigen" id="ciudadOrigen" <?php echo 'value=' . $ciudadOrigen ?>>
                        <input type="hidden" name="terminalOrigen" id="terminalOrigen" <?php echo 'value=' . $terminalOrigen ?>>
                        <!--Ciudad Origen-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2" id="ciudad">
                                <label for='cmbCiudadOrigen' class='form-label'>Ciudad de Origen</label>
                                <select disabled class='form-control' name='cmbCiudadOrigen' id='cmbCiudadOrigen'>
                                    <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarCiudades()-->
                                </select>
                            </div>
                        </div>
                        <!--Terminal Origen-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2" id="terminal">
                                <label for='cmbTerminalOrigen' class='form-label'>Terminal de Origen</label>
                                <select disabled class='form-control' name='cmbTerminalOrigen' id='cmbTerminalOrigen'>
                                    <!--Se rellena mediante scrip paisesOrigenDestino.js, funcion cargarTerminales()-->
                                </select>
                            </div>
                        </div>

                        <!--Pais Destino-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="cmbPaisDestino" class="form-label">País de Destino</label>
                                <select disabled class="form-control" name="cmbPaisDestino" id="cmbPaisDestino">
                                    <option value="">-- Seleccione un País --</option>
                                    <!--Rellenado mediante BD-->
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                    <?php
                                    $sql = "SELECT Id_Pais, Nombre_Pais FROM Paises";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['Id_Pais'] == $paisDestino) {
                                            echo "<option selected value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                        }
                                    }
                                    ?>
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="ciudadDestino" id="ciudadDestino" <?php echo 'value=' . $ciudadDestino ?>>
                        <input type="hidden" name="terminalDestino" id="terminalDestino" <?php echo 'value=' . $terminalDestino ?>>
                        <!--Ciudad Destino-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2" id="ciudad">
                                <label for='cmbCiudadDestino' class='form-label'>Ciudad de Destino</label>
                                <select disabled class='form-control' name='cmbCiudadDestino' id='cmbCiudadDestino'>
                                    <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarCiudades()-->
                                </select>
                            </div>
                        </div>
                        <!--Terminal Destino-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2" id="terminal">
                                <label for='cmbTerminalDestino' class='form-label'>Terminal de Destino</label>
                                <select disabled class='form-control' name='cmbTerminalDestino' id='cmbTerminalDestino'>
                                    <!--Se rellena mediante scrip paisesOrigenDestino.js, funcion cargarTerminales()-->
                                </select>
                            </div>
                        </div>

                        <!------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="d-flex justify-content-center my-4">
                            <table id='tabla' class="table table-striped table-bordered" style="max-width: 1100px;">
                                <!--Bootstrap: Estilo de tabla-->
                                <?php
                                $sql = "SELECT * FROM v_Viaje_Compra_Boleto
                                        WHERE Id_Viaje = " . $idViaje . " AND Numero_Asiento = " . $numReservaAsiento;
                                $result = mysqli_query($conexion, $sql);
                                if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                                    echo
                                    "<thead>
                                    <tr>
                                    <th scope='col' style='text-align: center;'>No. Viaje</th>
                                    <th scope='col' style='text-align: center;'>No. Asiento</th>
                                    <th scope='col' style='text-align: center;'>Fecha de Salida</th>
                                    <th scope='col' style='text-align: center;'>Hora de Salida</th>
                                    <th scope='col' style='text-align: center;'>Terminal de Origen</th>
                                    <th scope='col' style='text-align: center;'>Terminal de Destino</th>
                                    <th scope='col' style='text-align: center;'>Placa del Bus</th>
                                    </tr>
                                    </thead>
                                    <tbody>";

                                    while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                                        echo
                                        "<tr>
                                        <th scope='row' style='text-align: center;'>" . $row["Id_Viaje"] . "</th>
                                        <th scope='row' style='text-align: center;'>" . $row["Numero_Asiento"] . "</th>
                                        <td scope='row' style='text-align: center;'>" . date('d-m-Y', strtotime($row["Fecha_Salida"])) . "</td>
                                        <td scope='row' style='text-align: center;'>" . date('h:i a', strtotime($row["Hora_Salida"])) . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Origen"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Destino"] . "</td>
                                        <td scope='row' style='text-align: center;'>" . $row["Id_Bus"] . "</td>
                                        </tr>";
                                    }
                                }
                                echo "</table>"; //Cerrado de tabla

                                if (mysqli_num_rows($result) == 0) { //Si la respuesta no contiene ningun registro, imprime que no hay resultados
                                    echo
                                    "<div class='col-12 text-center mt-5 mb-5'>
                                        <p>No se encontraron resultados</p>
                                    </div>";
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                        <!--Tarifa-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="cmbTarifa" class="form-label">Tipo de Tarifa</label>
                                <select disabled class="form-control" name="cmbTarifa" id="cmbTarifa">
                                    <?php
                                    $sql = "SELECT Id_Tarifa FROM Tarifas_Boletos WHERE Id_Tarifa = '" . $idTarifa . "';";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if (($row['Id_Tarifa'] % 2) != 0) {
                                            echo "<option value='" . $row['Id_Tarifa'] . "'>Tarifa Normal</option>";
                                        } else if (($row['Id_Tarifa'] % 2) == 0) {
                                            echo "<option value='" . $row['Id_Tarifa'] . "'>Tarifa de Reajuste</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!--Precio-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtPrecio" class="form-label">Precio</label>
                                <div class="form-inline">
                                    <p style="float: left; margin-top: 6px;">$.</p>
                                    <p style="float: left; width: 20px;"></p>
                                    <input type="number" class="form-control" style="max-width: 380px; float: left;" name="txtPrecio" id="txtPrecio" min="0" step="0.01" <?php echo 'value=' . $precio ?> readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                        <input type='hidden' name='txtReservaAsiento' id='txtReservaAsiento'  value=''>   
                        <?php
                            $fechaActual = date('Y-m-d');
                            if ($fechaActual < $fechaSalida && $numReservaAsiento != 0 && (($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) || ($_SESSION["admin"] == 0 || $_SESSION["cargo"] == 1)) ){
                                //echo  " fecha actual " . $fechaActual . " fecha salida ".$fechaSalida;
                                echo "
                                <div class='d-flex justify-content-center my-4' id='mostrarReserva' name='mostrarReserva'>
                                    <table class='autobus'>";
                                    $sql = 'SELECT Numero_Asiento FROM Boletos WHERE Id_Viaje = ' . $idViaje;
                                    $result = mysqli_query($conexion, $sql);
                                    echo "                      
                                        <tr>
                                            <td ><button onClick='return actualizarReserva(4)' name='4' id='4' value='vacio' class='disponible'>4</button></td>
                                            <td ><button onClick='return actualizarReserva(8)' name='8' id='8' value='vacio' class='disponible'>8</button></td>
                                            <td ><button onClick='return actualizarReserva(12)' name='12' id='12' value='vacio' class='disponible'>12</button></td>
                                            <td ><button onClick='return actualizarReserva(16)' name='16' id='16' value='vacio' class='disponible'>16</button></td>
                                            <td ><button onClick='return actualizarReserva(20)' name='20' id='20' value='vacio' class='disponible'>20</button></td>
                                            <td ><button onClick='return actualizarReserva(24)' name='24' id='24' value='vacio' class='disponible'>24</button></td>
                                            <td ><button onClick='return actualizarReserva(28)' name='28' id='28' value='vacio' class='disponible'>28</button></td>
                                            <td ><button onClick='return actualizarReserva(32)' name='32' id='32' value='vacio' class='disponible'>32</button></td>
                                            <td ><button onClick='return actualizarReserva(36)' name='36' id='36' value='vacio' class='disponible'>36</button></td>
                                            <td ><button onClick='return actualizarReserva(40)' name='40' id='40' value='vacio' class='disponible'>40</button></td>
                                            <td ><button onClick='return actualizarReserva(44)' name='44' id='44' value='vacio' class='disponible'>44</button></td>
                                            <td ><button onClick='return actualizarReserva(48)' name='48' id='48' value='vacio' class='disponible'>48</button></td>
                                            <td ><button onClick='return actualizarReserva(52)' name='52' id='52' value='vacio' class='disponible'>52</button></td>
                                        </tr>
                                        <tr>
                                            <td><button onClick='return actualizarReserva(3)' name='3' id='3' value='vacio' class='disponible'>3</button></td>
                                            <td><button onClick='return actualizarReserva(7)' name='7' id='7' value='vacio' class='disponible'>7</button></td>
                                            <td ><button onClick='return actualizarReserva(11)' name='11' id='11' value='vacio' class='disponible'>11</button></td>
                                            <td ><button onClick='return actualizarReserva(15)' name='15' id='15' value='vacio' class='disponible'>15</button></td>
                                            <td ><button onClick='return actualizarReserva(19)' name='19' id='19' value='vacio' class='disponible'>19</button></td>
                                            <td ><button onClick='return actualizarReserva(23)' name='23' id='23' value='vacio' class='disponible'>23</button></td>
                                            <td ><button onClick='return actualizarReserva(27)' name='27' id='27' value='vacio' class='disponible'>27</button></td>
                                            <td ><button onClick='return actualizarReserva(31)' name='31' id='31' value='vacio' class='disponible'>31</button></td>
                                            <td ><button onClick='return actualizarReserva(35)' name='35' id='35' value='vacio' class='disponible'>35</button></td>
                                            <td ><button onClick='return actualizarReserva(39)' name='39' id='39' value='vacio' class='disponible'>39</button></td>
                                            <td ><button onClick='return actualizarReserva(43)' name='43' id='43' value='vacio' class='disponible'>43</button></td>
                                            <td ><button onClick='return actualizarReserva(47)' name='47' id='47' value='vacio' class='disponible'>47</button></td>
                                            <td ><button onClick='return actualizarReserva(51)' name='51' id='51' value='vacio' class='disponible'>51</button></td>
                                        </tr>
                                        <tr>
                                            <td style='padding-bottom: 30px;'>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><button onClick='return actualizarReserva(2)' name='2' id='2' value='vacio' class='disponible'>2</button></td>
                                            <td><button onClick='return actualizarReserva(6)' name='6' id='6' value='vacio' class='disponible'>6</button></td>
                                            <td ><button onClick='return actualizarReserva(10)' name='10' id='10' value='vacio' class='disponible'>10</button></td>
                                            <td ><button onClick='return actualizarReserva(14)' name='14' id='14' value='vacio' class='disponible'>14</button></td>
                                            <td ><button onClick='return actualizarReserva(18)' name='18' id='18' value='vacio' class='disponible'>18</button></td>
                                            <td ><button onClick='return actualizarReserva(22)' name='22' id='22' value='vacio' class='disponible'>22</button></td>
                                            <td ><button onClick='return actualizarReserva(26)' name='26' id='26' value='vacio' class='disponible'>26</button></td>
                                            <td ><button onClick='return actualizarReserva(30)' name='30' id='30' value='vacio' class='disponible'>30</button></td>
                                            <td ><button onClick='return actualizarReserva(34)' name='34' id='34' value='vacio' class='disponible'>34</button></td>
                                            <td ><button onClick='return actualizarReserva(38)' name='38' id='38' value='vacio' class='disponible'>38</button></td>
                                            <td ><button onClick='return actualizarReserva(42)' name='42' id='42' value='vacio' class='disponible'>42</button></td>
                                            <td ><button onClick='return actualizarReserva(46)' name='46' id='46' value='vacio' class='disponible'>46</button></td>
                                            <td ><button onClick='return actualizarReserva(50)' name='50' id='50' value='vacio' class='disponible'>50</button></td>
                                            <td ><button onClick='return actualizarReserva(54)' name='54' id='54' value='vacio' class='disponible'>54</button></td>
                                        </tr>
                                        <tr>
                                            <td><button onClick='return actualizarReserva(1)' name='1' id='1' value='vacio' class='disponible'>1</button></td>
                                            <td><button onClick='return actualizarReserva(5)' name='5' id='5' value='vacio' class='disponible'>5</button></td>
                                            <td ><button onClick='return actualizarReserva(9)' name='9' id='9' value='vacio' class='disponible'>9</button></td>
                                            <td ><button onClick='return actualizarReserva(13)' name='13' id='13' value='vacio' class='disponible'>13</button></td>
                                            <td ><button onClick='return actualizarReserva(17)' name='17' id='17' value='vacio' class='disponible'>17</button></td>
                                            <td ><button onClick='return actualizarReserva(21)' name='21' id='21' value='vacio' class='disponible'>21</button></td>
                                            <td ><button onClick='return actualizarReserva(25)' name='25' id='25' value='vacio' class='disponible'>25</button></td>
                                            <td ><button onClick='return actualizarReserva(29)' name='29' id='29' value='vacio' class='disponible'>29</button></td>
                                            <td ><button onClick='return actualizarReserva(33)' name='33' id='33' value='vacio' class='disponible'>33</button></td>
                                            <td ><button onClick='return actualizarReserva(37)' name='37' id='37' value='vacio' class='disponible'>37</button></td>
                                            <td ><button onClick='return actualizarReserva(41)' name='41' id='41' value='vacio' class='disponible'>41</button></td>
                                            <td ><button onClick='return actualizarReserva(45)' name='45' id='45' value='vacio' class='disponible'>45</button></td>
                                            <td ><button onClick='return actualizarReserva(49)' name='49' id='49' value='vacio' class='disponible'>49</button></td>
                                            <td ><button onClick='return actualizarReserva(53)' name='53' id='53' value='vacio' class='disponible'>53</button></td>
                                        </tr>
                                    ";
                                    while ($row = mysqli_fetch_assoc($result))
                                    {        
                                        if($row['Numero_Asiento']){
                                            echo "<script>
                                                    document.getElementById(".$row['Numero_Asiento'].").value = 'noDisponible'
                                                    document.getElementById(".$row['Numero_Asiento'].").className = 'ocupado';
                                                </script>
                                            ";
                                        }
                                        if($row['Numero_Asiento'] == $numReservaAsiento){
                                            echo "<script>
                                                document.getElementById(".$row['Numero_Asiento'].").value = 'reservado'
                                                document.getElementById(".$row['Numero_Asiento'].").className = 'reserva';
                                            </script>
                                        ";
                                        }
                                    }
                                echo "
                                    </table>
                                </div>
                                
                                <div class='col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2'></div>
                                <div class='d-flex justify-content-center my-4' id='tablaInfo' name='tablaInfo'>
                                    <table style='width: 50%; height: 50%;'>
                                        <tr class='mostrarTablaInfo'>
                                            <td class='cuadroDisponible'></td>
                                            <td>Disponible</td>
                                            <td class='cuadroReservado'></td>
                                            <td>Reservado</td>
                                            <td class='cuadroSuAsiento'></td>
                                            <td>Su Asiento</td>
                                        <tr>
                                    </table>
                                </div>";
                            }
                        ?>

                        <div class="row">
                            <!--Botones-->
                            <div class="d-flex justify-content-center">
                                <input type="hidden" name="fechaAhora" id="fechaAhora" value="">
                                <input type="hidden" name="fechaSalida" id="fechaSalida" <?php echo 'value="' . $fechaSalida . '"' ?>>
                                <a class='btn btn-secondary m-5' href='form_filtroBoleto.php'> Regresar</a>
                                <?php
                                $fechaActual = date('Y-m-d');
                                
                                if(($numReservaAsiento != 0 && $fechaActual < $fechaSalida ) && (($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) || ($_SESSION["admin"] == 0 || $_SESSION["cargo"] == 1))){
                                    echo "<button onClick='return cancelar()' name='btnCancelar' id='btnCancelar' class='btn btn-primary m-5' style='background-color: #36B844; border-color: #36B844;'>Marcar como cancelado</button>";     
                                    echo "<button onClick='return validarActualizar()'' name='btnGuardar' id='btnGuardar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Actualizar Boleto</button>";
                                }
                                if(($numReservaAsiento != 0 && $fechaActual < $fechaSalida ) || ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3)){
                                    echo "<button onClick='return generar()' name='btnGenerar' id='btnGenerar' class='btn btn-primary m-5' style='background-color: #E36039; border-color: #E36039;'>Generar PDF</button>";
                                }
                                ?>
                                <!--El boton llama a la funcion de revision donde si las validaciones son correctas se hará el submit-->
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
<?php
} else { //Pagina que se carga cuando se trata de acceder con la url sin ser administrador
    echo "<script>
            window.location.href = '../../forms/principal/principal.php';
        </script>";
}
?>