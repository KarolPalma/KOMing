<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
include("../../php/tarifas_boletos/recuperarTarifaBoleto.php");
//Incluye el archivo php que recupera los datos de la BD mediante una vista para utilizar esos valores en los campos
include("../../php/tarifas_boletos/actualizarTarifaBoleto.php");
//Incluye el archivo php que actualiza o desactiva clientes en la BD cuando se cambia el campo de "accion" al valor de guardar o desactivar
if ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <title>Actualizar Tarifa de Boletos - KOMing</title>
        <script src="../../js/jquery-1.10.2.min.js"></script>
        <!--Libreria básica de JQuery-->
        <script src="../../js/tarifas_boletos/tarifasBoletos.js"></script>
        <!--Script de validación de campos-->
        <script src="../../js/paises/paisesOrigenDestino.js"></script>
        <!--Script de actualización en tiempo real de selects de ciudades y terminales-->
    </head>

    <body>
        <!--Tanto los valores de Bootstrap como los de las variables escondidas se explican en el form_insertarCliente.php-->
        <div class="container">
            <div class="col-12 text-center mt-5 mb-5">
                <h3 style="background-color: #3987E3; color: white;">Actualizar Tarifa de Boletos</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action="">
                <input type="hidden" name="accion" id="accion" value="">
                <!--Modificar usuario a POST-->
                <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'" ?>>
                <div class="col-12">
                    <div class="row">
                        <!--No. Tarifa-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                            <div class="form-group mt-2 mb-2">
                                <!--Bootstrap: Aplica CSS al label e input, añade margen arriba y abajo-->
                                <label for="txtNoTarifa" class="form-label">No. Tarifa</label>
                                <input type="number" class="form-control" name="txtNoTarifa" id="txtNoTarifa" <?php echo 'value="' . $_GET['idTarifaBoleto'] . '"' ?> readonly>
                            </div>
                        </div>
                        <!--Descripcion-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtDescripcion" class="form-label">Descripción</label>
                                <textarea rows="4" cols="50" class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Ingrese la descripción de la tarifa"><?php echo "" . $descripcion ?></textarea>
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
                        <!--Estos inputs escondidos sirven para la recuperacion de los valores de ciudad y terminal
                        Ya que no se puede marcar un option como seleccionado desde aqui, debe hacerce desde pais.js
                        donde se mandara el dato en estos inputs para hacer un POST de AJAX e imprimir el valor seleccionado-->
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
                        <!--Estos inputs escondidos sirven para la recuperacion de los valores de ciudad y terminal
                        Ya que no se puede marcar un option como seleccionado desde aqui, debe hacerce desde pais.js
                        donde se mandara el dato en estos inputs para hacer un POST de AJAX e imprimir el valor seleccionado-->
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

                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                        <!--Precio-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtPrecio" class="form-label">Precio</label>
                                <div class="form-inline">
                                    <p style="float: left; margin-top: 6px;">$.</p>
                                    <p style="float: left; width: 20px;"></p>
                                    <input type="number" class="form-control" style="max-width: 380px; float: left;" name="txtPrecio" id="txtPrecio" min="0" step="0.01" <?php echo 'value="' . $precio . '"' ?>>
                                </div>
                            </div>
                        </div>
                        <!--Porcentaje Reajuste-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtPorcentaje" class="form-label">Porcentaje de Reajuste</label>
                                <div class="form-inline">
                                    <input type="number" class="form-control" style="max-width: 400px; float: left;" name="txtPorcentaje" id="txtPorcentaje" min="0" max="100" <?php echo 'value="' . $porcentaje . '"' ?>>
                                    <p style="float: left; margin-top: 6px;">%</p>
                                </div>
                            </div>
                        </div>

                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <?php
                            if ($activo == 1) { //Si el cliente está como activo en la BD el boton será visible, si no, no
                                echo "<button onClick='return desactivar()' name='btnDesactivar' id='btnDesactivar' class='btn btn-secondary m-5' style='background-color: #E36039; border-color: #E36039;'>Desactivar</button>";
                                //Llama a la funcion desactivar() de clientes.js
                                echo "<button onclick='return validar()' name='btnGuardar' id='btnGuardar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Actualizar</button>";
                            }else{
                                echo "<button onclick='return validar()' name='btnGuardar' id='btnGuardar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Activar Tarifa</button>";
                            }
                            ?>
                            
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