<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
include("../../php/viajes/recuperarViaje.php");
include("../../php/viajes/actualizarViaje.php");
//Llama a la conexión a la base de datos mediante conexion.php
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
    <title>Viajes - KOMing</title>
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <script src="../../js/paises/paisesOrigenDestino.js"></script>
    <script src="../../js/viajes/viajes.js"></script>
    <!--Scripts-->
    <script type="text/javascript">
        function validar() {
            if (document.getElementById("cmbEstado").value == "" && document.getElementById("txtViaje").value == "" &&
                document.getElementById("cmbTerminalOrigen").value == "" && document.getElementById("cmbTerminalDestino").value == "") {
                alert("Debe ingresar una opción de filtrado");
                document.getElementById("txtBoleto").focus();
            } else {
                document.getElementById("accion").value = "consultar"; //Al cambiar este valor, el incrutado PHP entra a la condicion
                document.getElementById("formulario").submit(); //Al hacer submit PHP puede recuperar los valores POST necesarios abajo
            }
            return false;
        }
    </script>
    <!--Fin Scripts-->
</head>

<body>

    <div class="container">
        <div class="col-12 text-center mt-5 mb-5">
            <h3 style="background-color: #3987E3; color: white;">Filtrar Viajes</h3>
        </div>
        <form name='formulario' id='formulario' method='POST' action="">
            <input type="hidden" name="accion" id="accion" value="">
            <input type="hidden" name="numViaje" id="numViaje" value="">
            <div class="col-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                    <!--No. Viaje-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2">
                            <label for="txtViaje" class="form-label">No. Viaje</label>
                            <input type="text" class="form-control" name="txtViaje" id="txtViaje" maxlength="15" placeholder="Ingrese el número de viaje" value="">
                        </div>
                    </div>
                    <!--Estado-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbEstado" class="form-label">Estado</label>
                            <select class="form-control" name="cmbEstado" id="cmbEstado">
                                <option value="">-- Seleccione un Estado --</option>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Estado_Viaje, Estado FROM Estados_Viajes";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['Id_Estado_Viaje'] . "'>" . $row['Estado'] . "</option>";
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
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
                                    echo "<option value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
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
                                    echo "<option value='" . $row['Id_Pais'] . "'>" . $row['Nombre_Pais'] . "</option>";
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
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
                                <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarTerminales()-->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Botones-->
                <div class="d-flex justify-content-center">
                    <?php
                    $accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //La accion que cambia con la funcion validar()
                    if ($accion == "consultar") {
                        echo "<a class='btn btn-secondary m-3' href='form_filtroViaje.php'> Regresar</a>";
                    }
                    ?>
                    <button onClick="return validar()" name="btnBuscar" id="btnBuscar" class="btn btn-primary m-3" style="background-color: #3987E3; border-color: #3987E3;">Buscar</button>
                    <!--Utiliza el script especificado en el head para validar que el campo no este vacio y hacer submit-->
                </div>
            </div>
    </div>
    </form>
    </div>

    <div class="d-flex justify-content-center my-4">
        <!--Bootstrap: Centrado de div-->
        <table id='tabla' class="table table-striped table-bordered" style="max-width: 1100px;">
            <!--Bootstrap: Estilo de tabla-->
            <?php
            $accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //La accion que cambia con la funcion validar()
            $viaje = isset($_POST["txtViaje"]) ? $_POST["txtViaje"] : "";
            $estado = isset($_POST["cmbEstado"]) ? $_POST["cmbEstado"] : "";
            $origen = isset($_POST["cmbTerminalOrigen"]) ? $_POST["cmbTerminalOrigen"] : "";
            $destino = isset($_POST["cmbTerminalDestino"]) ? $_POST["cmbTerminalDestino"] : "";
            if ($accion == "consultar") {
                $sql = '';
                if ($viaje != '') {
                    $sql = "SELECT * FROM v_Viaje WHERE Id_Viaje = '$viaje' ";
                }
                if ($estado != '') {
                    if ($sql == '') {
                        $sql = "SELECT * FROM v_Viaje WHERE Id_Estado_Viaje = '$estado' ";
                    } else {
                        $sql = $sql . " AND Id_Estado_Viaje = '$estado' ";
                    }
                }
                if ($origen != '') {
                    if ($sql == '') {
                        $sql = "SELECT * FROM v_Viaje WHERE Id_Terminal_Origen = '$origen' ";
                    } else {
                        $sql = $sql . " AND Id_Terminal_Origen = '$origen' ";
                    }
                }
                if ($destino != '') {
                    if ($sql == '') {
                        $sql = "SELECT * FROM v_Viaje WHERE Id_Terminal_Destino = '$destino' ";
                    } else {
                        $sql = $sql . " AND Id_Terminal_Destino = '$destino' ";
                    }
                }
                $sql = $sql . " ORDER BY Id_Viaje";
                $result = mysqli_query($conexion, $sql);
                if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                    echo
                    "<thead>
                        <tr>
                            <th scope='col'>No. Viaje</th>
                            <th scope='col'>Fecha de Salida</th>
                            <th scope='col'>Hora de Salida</th>
                            <th scope='col'>Terminal de Origen</th>
                            <th scope='col'>Terminal de Destino</th>
                            <th scope='col'>Estado</th>
                            <th style='text-align: center;' scope='col'>Actualizar</th>
                            <th style='text-align: center;' scope='col'>Reporte</th>
                        </tr>
                        </thead>
                        <tbody>";

                    while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                        echo
                        "<tr>
						<th scope='row'>" . $row["Id_Viaje"] . "</td>
                        <td scope='row'>" . date('d-m-Y', strtotime($row["Fecha_Salida"])) . "</td>
						<td scope='row'>" . date('h:i a', strtotime($row["Hora_Salida"])) . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Origen"] . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Destino"] . "</td>
                        <td scope='row'>" . $row["Estado"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_actualizarViaje.php?idViaje=" . $row["Id_Viaje"] . "'>Actualizar</a></td>
                        <td><a class='btn btn-primary' style='background-color: #E36039; border-color: #E36039;' onClick='return generarReporte(".$row["Id_Viaje"].")'>Imprimir</a></td>
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
                $sql = '';
            } else {
                $sql = "SELECT * FROM v_Viaje";
                $result = mysqli_query($conexion, $sql);
                if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                    echo
                    "<thead>
                        <tr>
                            <th scope='col'>No. Viaje</th>
                            <th scope='col'>Fecha de Salida</th>
                            <th scope='col'>Hora de Salida</th>
                            <th scope='col'>Terminal de Origen</th>
                            <th scope='col'>Terminal de Destino</th>
                            <th scope='col'>Estado</th>
                            <th style='text-align: center;' scope='col'>Actualizar</th>
                            <th style='text-align: center;' scope='col'>Reporte</th>
                        </tr>
                        </thead>
                        <tbody>";

                    while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                        echo
                        "<tr>
						<th scope='row'>" . $row["Id_Viaje"] . "</td>
                        <td scope='row'>" . date('d-m-Y', strtotime($row["Fecha_Salida"])) . "</td>
						<td scope='row'>" . date('h:i a', strtotime($row["Hora_Salida"])) . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Origen"] . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Destino"] . "</td>
                        <td scope='row'>" . $row["Estado"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_actualizarViaje.php?idViaje=" . $row["Id_Viaje"] . "'>Actualizar</a></td>
                        <td><a class='btn btn-primary' style='background-color: #E36039; border-color: #E36039;' onClick='return generarReporte(".$row["Id_Viaje"].")'>Imprimir</a></td>
					    </tr>";
                    }
                }
                echo "</table>"; //Cerrado de tabla
            }
            ?>
            </tbody>
        </table>
    </div>
    <br>

    <!-- Footer -->
    <footer class="py-5" style="background-color: #24242c;">
        <div class="container">
        </div>
    </footer>
</body>

</html>