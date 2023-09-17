<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
include("../../php/encomiendas/recuperarEncomienda.php");
include("../../php/encomiendas/marcarEncomienda.php");
include("../../php/encomiendas/consultarEncomienda.php");
date_default_timezone_set('America/El_Salvador');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
    <title>Ver Encomienda - KOMing</title>
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <!--Libreria básica de JQuery-->
    <script src="../../js/paises/paisesOrigenDestino.js"></script>
    <script>
        function generar() {
            document.getElementById("accion").value = "generar";
            document.getElementById("formulario").submit();
            return false;
        }
        function marcar() {
            document.getElementById("accion").value = "marcar";
            document.getElementById("formulario").submit();
            return false;
        }
        function noMarcar() {
            document.getElementById("accion").value = "noMarcar";
            document.getElementById("formulario").submit();
            return false;
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="col-12 text-center mt-5 mb-5">
            <!--Bootstrap: Centrado de Texto y margenes arriba y abajo-->
            <h3 style="background-color: #3987E3; color: white;">Ver Encomienda</h3>
        </div>
        <form name='formulario' id='formulario' method='POST' action="">
            <input type="hidden" name="accion" id="accion" value="">
            <!--Modificar usuario a POST cuando se tenga la variable de sesion de usuario (luego del login)-->
            <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'"?>>
            <div class="col-12">
                <div class="row">
                    <!--No. Guia-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                        <div class="form-group mt-2 mb-2">
                            <!--Bootstrap: Aplica CSS al label e input, añade margen arriba y abajo-->
                            <label for="txtNoGuia" class="form-label">No. Guia</label>
                            <input type="number" class="form-control" name="txtNoGuia" id="txtNoGuia" maxlength="45" <?php echo "value='" . $_GET['idGuia'] . "'" ?> readonly>
                        </div>
                    </div>
                    <!--Volumen-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <!--Bootstrap: Aplica CSS al label e input, añade margen arriba y abajo-->
                            <label for="txtVolumen" class="form-label">No. Volumen</label>
                            <input type="number" class="form-control" name="txtVolumen" id="txtVolumen" maxlength="45" <?php echo "value='" . $volumen . "'" ?> readonly>
                        </div>
                    </div>
                    <!--No. Viaje-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtNoViaje" class="form-label">No. Viaje</label>
                            <input type="text" class="form-control" name="txtNoViaje" id="txtNoViaje" placeholder="Ingrese el número de identidad del cliente" <?php echo 'value="' . $idViaje . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Fecha Compra-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtFechaEnvio" class="form-label">Fecha de Envio</label>
                            <input type="date" class="form-control" name="txtFechaEnvio" id="txtFechaEnvio" <?php echo 'value="' . $fechaEnvio . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Hora Compra-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtHoraEnvio" class="form-label">Hora Envio</label>
                            <input type="time" class="form-control" name="txtHoraEnvio" id="txtHoraEnvio" <?php echo 'value="' . $horaEnvio . '"' ?> readonly>
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
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--No. Identidad del Emisor-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtIdEmisor" class="form-label">No. Identidad del Emisor</label>
                            <input type="text" class="form-control" name="txtIdEmisor" id="txtIdEmisor" placeholder="Ingrese el número de identidad del cliente" <?php echo 'value="' . $idEmisor . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Nombre Emisor-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtNombreEmisor" class="form-label">Nombre del Emisor</label>
                            <select class="form-control" name="txtNombreEmisor" id="txtNombreEmisor" disabled>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Cliente, CONCAT(Nombres, ' ', Apellidos) AS Nombre FROM Clientes WHERE Id_Cliente = '$idEmisor'";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['Id_Cliente'] . "'>" . $row['Nombre'] . "</option>";
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--No. Identidad del Receptor-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtIdReceptor" class="form-label">No. Identidad del Receptor</label>
                            <input type="text" class="form-control" name="txtIdReceptor" id="txtIdReceptor" placeholder="Ingrese el número de identidad del cliente" <?php echo 'value="' . $idReceptor . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Nombre Receptor-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtNombreReceptor" class="form-label">Nombre del Receptor</label>
                            <select class="form-control" name="txtNombreReceptor" id="txtNombreReceptor" disabled>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Cliente, CONCAT(Nombres, ' ', Apellidos) AS Nombre FROM Clientes WHERE Id_Cliente = '$idReceptor'";
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
                                    if ($row['Id_Pais'] == $idPaisOrigen) {
                                        echo "<option selected value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                    }
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="ciudadOrigen" id="ciudadOrigen" <?php echo 'value=' . $idCiudadOrigen ?>>
                    <input type="hidden" name="terminalOrigen" id="terminalOrigen" <?php echo 'value=' . $idTerminalOrigen ?>>
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
                                    if ($row['Id_Pais'] == $idPaisDestino) {
                                        echo "<option selected value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                    }
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="ciudadDestino" id="ciudadDestino" <?php echo 'value=' . $idCiudadDestino ?>>
                    <input type="hidden" name="terminalDestino" id="terminalDestino" <?php echo 'value=' . $idTerminalDestino ?>>
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
                            $sql = "SELECT * FROM v_Viaje_Compra_Encomienda
                                        WHERE Id_Viaje = " . $idViaje;
                            $result = mysqli_query($conexion, $sql);
                            if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                                echo
                                "<thead>
                                    <tr>
                                    <th scope='col' style='text-align: center;'>No. Viaje</th>
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
                    <!--Tarifa-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbTarifa" class="form-label">Tipo de Tarifa</label>
                            <select disabled class="form-control" name="cmbTarifa" id="cmbTarifa">
                                <?php
                                $sql = "SELECT Id_Tarifa FROM Tarifas_Encomiendas WHERE Id_Tarifa = '" . $idTarifa . "';";
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
                    <!--Reclamada-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtReclamada" class="form-label">Estado</label>
                            <select disabled class="form-control" name="txtReclamada" id="txtReclamada">
                                <?php
                                $sql = "SELECT Reclamada FROM Encomiendas WHERE Id_Guia = '" . $idGuia . "';";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if (($row['Reclamada'] % 2) != 0) {
                                        echo "<option value='" . $row['Reclamada'] . "'>Reclamada</option>";
                                    } else if (($row['Reclamada'] % 2) == 0) {
                                        echo "<option value='" . $row['Reclamada'] . "'>No Reclamada</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <a class='btn btn-secondary m-5' href='form_filtroEncomienda.php'> Regresar</a>
                            <?php 
                            if($reclamada == 0){
                               echo "<button onClick='return marcar()' name='btnMarcar' id='btnGenerar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Marcar como reclamada</button>";
                            }else if($reclamada == 1 && ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3)){
                                echo "<button onClick='return noMarcar()' name='btnMarcar' id='btnGenerar' class='btn btn-primary m-5' style='background-color: #36B844; border-color: #36B844;'>Marcar como no reclamada</button>";
                            }
                            ?>
                            <button onClick="return generar()" name="btnGenerar" id="btnGenerar" class="btn btn-primary m-5" style="background-color: #E36039; border-color: #E36039;">Generar PDF</button>
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