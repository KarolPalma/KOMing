<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
include("../../php/viajes/recuperarViaje.php");
include("../../php/viajes/actualizarViaje.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
    <title>Actualizar Viaje - KOMing</title>
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <!--Libreria básica de JQuery-->
    <script src="../../js/viajes/viajes.js"></script>
    <!--Script de validación de campos-->
    <script src="../../js/paises/paisesOrigenDestino.js"></script>
    <!--Script de actualización en tiempo real de selects de ciudades y terminales-->
</head>

<body>
    <div class="container">
        <div class="col-12 text-center mt-5 mb-5">
            <!--Bootstrap: Centrado de Texto y margenes arriba y abajo-->
            <h3 style="background-color: #3987E3; color: white;">Actualizar Viaje</h3>
        </div>
        <form name='formulario' id='formulario' method='POST' action="">
            <input type="hidden" name="accion" id="accion" value="">
            <!--Modificar usuario a POST cuando se tenga la variable de sesion de usuario (luego del login)-->
            <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'"?>>
            <div class="col-12">
                <div class="row">
                    <!--No. Viaje-->
                    <?php $sql = "SELECT (COUNT(*) + 1) AS C FROM Viajes";
                    $noViaje = 0;
                    $result = mysqli_query($conexion, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $noViaje = $row["C"];
                    } ?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtNoViaje" class="form-label">No. de Viaje</label>
                            <input type="number" class="form-control" name="txtNoViaje" id="txtNoViaje" maxlength="45" <?php echo 'value="' . $_GET['idViaje'] . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Fecha Salida-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtFechaSalida" class="form-label">Fecha de Salida</label>
                            <input type="date" class="form-control" name="txtFechaSalida" id="txtFechaSalida" <?php echo 'value="' . $fechaSalida . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Hora Salida-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtHoraSalida" class="form-label">Hora de Salida</label>
                            <input type="time" class="form-control" name="txtHoraSalida" id="txtHoraSalida" <?php echo 'value="' . $horaSalida . '"' ?> readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Fecha Llegada-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtFechaLlegada" class="form-label">Fecha Estimada de Llegada</label>
                            <input type="date" class="form-control" name="txtFechaLlegada" id="txtFechaLlegada" <?php echo 'value="' . $fechaLlegada . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Hora Llegada-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtHoraLlegada" class="form-label">Hora Estimada de Llegada</label>
                            <input type="time" class="form-control" name="txtHoraLlegada" id="txtHoraLlegada" <?php echo 'value="' . $horaLlegada . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Pais Origen-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbPaisOrigen" class="form-label">País de Origen</label>
                            <select class="form-control" name="cmbPaisOrigen" id="cmbPaisOrigen" disabled>
                                <option value="">-- Seleccione un País --</option>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Pais, Nombre_Pais FROM Paises";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['Id_Pais'] == $paisOrigen) { //Si el id de la respuesta concuerda con el id de recuperarCliente.php, lo setea como seleccionado
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
                    <input type="hidden" name="ciudadOrigen" id="ciudadOrigen" <?php echo 'value=' . $ciudadOrigen ?>>
                    <input type="hidden" name="terminalOrigen" id="terminalOrigen" <?php echo 'value=' . $terminalOrigen ?>>
                    <!--Ciudad Origen-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="ciudad">
                            <label for='cmbCiudadOrigen' class='form-label'>Ciudad de Origen</label>
                            <select class='form-control' name='cmbCiudadOrigen' id='cmbCiudadOrigen' disabled>
                                <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarCiudades()-->
                            </select>
                        </div>
                    </div>
                    <!--Terminal Origen-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="terminal">
                            <label for='cmbTerminalOrigen' class='form-label'>Terminal de Origen</label>
                            <select class='form-control' name='cmbTerminalOrigen' id='cmbTerminalOrigen' disabled>
                                <!--Se rellena mediante scrip paisesOrigenDestino.js, funcion cargarTerminales()-->
                            </select>
                        </div>
                    </div>

                    <!--Pais Destino-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbPaisDestino" class="form-label">País de Destino</label>
                            <select class="form-control" name="cmbPaisDestino" id="cmbPaisDestino" disabled>
                                <option value="">-- Seleccione un País --</option>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Pais, Nombre_Pais FROM Paises";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['Id_Pais'] == $paisDestino) { //Si el id de la respuesta concuerda con el id de recuperarCliente.php, lo setea como seleccionado
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
                    <input type="hidden" name="ciudadDestino" id="ciudadDestino" <?php echo 'value=' . $ciudadDestino ?>>
                    <input type="hidden" name="terminalDestino" id="terminalDestino" <?php echo 'value=' . $terminalDestino ?>>
                    <!--Ciudad Destino-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="ciudad">
                            <label for='cmbCiudadDestino' class='form-label'>Ciudad de Destino</label>
                            <select class='form-control' name='cmbCiudadDestino' id='cmbCiudadDestino' disabled>
                                <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarCiudades()-->
                            </select>
                        </div>
                    </div>
                    <!--Terminal Destino-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="terminal">
                            <label for='cmbTerminalDestino' class='form-label'>Terminal de Destino</label>
                            <select class='form-control' name='cmbTerminalDestino' id='cmbTerminalDestino' disabled>
                                <!--Se rellena mediante scrip paisesOrigenDestino.js, funcion cargarTerminales()-->
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="txtBus" id="txtBus" <?php echo 'value=' . $idBus ?>>
                    <input type="hidden" name="txtChofer" id="txtChofer" <?php echo 'value=' . $idChofer ?>>
                    <!--Chofer-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbChofer" class="form-label">Chofer Encargado</label>
                            <select class="form-control" name="cmbChofer" id="cmbChofer">
                                <option value="">-- Seleccione un Chofer --</option>
                                <!--Rellenado mediante BD-->

                            </select>
                        </div>
                    </div>
                    <!--Bus-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbBus" class="form-label">Bus Asignado (Capacidad: Personas, Encomiendas)</label>
                            <select class="form-control" name="cmbBus" id="cmbBus">
                                <option value="">-- Seleccione un Bus --</option>
                                <!--Rellenado mediante BD-->

                            </select>
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
                                    if ($row['Id_Estado_Viaje'] == $idEstadoViaje) {
                                        echo "<option selected value='" . $row['Id_Estado_Viaje'] . "'>" . $row['Estado'] . "</option>";
                                    } else {
                                        echo "<option value='" . $row['Id_Estado_Viaje'] . "'>" . $row['Estado'] . "</option>";
                                    }
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Capacidad Personas Total-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtTotalPersonas" class="form-label">Capacidad Total de Personas</label>
                            <input type="text" class="form-control" name="txtTotalPersonas" id="txtTotalPersonas" <?php echo 'value="' . $capacidadBoletos . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Capacidad Personas Actual-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtBoletosVendidos" class="form-label">No. Boletos Vendidos</label>
                            <input type="text" class="form-control" name="txtBoletosVendidos" id="txtBoletosVendidos" <?php echo 'value="' . $boletos . '"' ?> readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Capacidad Encomiendas Total-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtTotalEncomiendas" class="form-label">Capacidad Volumen de Encomiendas</label>
                            <input type="text" class="form-control" name="txtTotalEncomiendas" id="txtTotalEncomiendas" <?php echo 'value="' . $capacidadEncomiendas . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Encomiendas Aceptadas-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtEncomiendas" class="form-label">No. Encomiendas Aceptadas</label>
                            <input type="text" class="form-control" name="txtEncomiendas" id="txtEncomiendas" <?php echo 'value="' . $encomiendas . '"' ?> readonly>
                        </div>
                    </div>
                    <!--Volumen de encomiendas-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtVolumen" class="form-label">Volumen de Encomiendas Aceptadas</label>
                            <input type="text" class="form-control" name="txtVolumen" id="txtVolumen" <?php echo 'value="' . $volumenEncomiendas . '"' ?> readonly>
                        </div>
                    </div>
                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <button onClick="return validar()" name="btnGuardar" id="btnGuardar" class="btn btn-primary m-5" style="background-color: #3987E3; border-color: #3987E3;">Guardar</button>
                            <button onClick="return generar()" name="btnGenerar" id="btnGenerar" class="btn btn-primary m-5" style="background-color: #E36039; border-color: #E36039;">Generar Listado de Pasajeros</button>
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