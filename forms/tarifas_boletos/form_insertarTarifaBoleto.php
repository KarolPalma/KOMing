<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
include("../../php/tarifas_boletos/insertarTarifaBoleto.php");
//Incluye el archivo php que inserta los datos a la BD cuando se cambia el campo de "accion" al valor de guardar
if ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <title>Insertar Tarifa de Boletos - KOMing</title>
        <script src="../../js/jquery-1.10.2.min.js"></script>
        <!--Libreria básica de JQuery-->
        <script src="../../js/tarifas_boletos/tarifasBoletos.js"></script>
        <!--Script de validación de campos-->
        <script src="../../js/paises/paisesOrigenDestino.js"></script>
        <!--Script de actualización en tiempo real de selects de ciudades y terminales-->
    </head>

    <body>
        <div class="container">
            <div class="col-12 text-center mt-5 mb-5">
                <!--Bootstrap: Centrado de Texto y margenes arriba y abajo-->
                <h3 style="background-color: #3987E3; color: white;">Insertar Tarifa de Boletos</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action="">
                <input type="hidden" name="accion" id="accion" value="">
                <!--Accion que será cambiada por la funcion validar en tarifaBoletos.js-->
                <!--Modificar usuario a POST cuando se tenga la variable de sesion de usuario (luego del login)-->
                <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'" ?>>
                <div class="col-12">
                    <div class="row">
                        <!--Bootstrap: Divide en filas la pagina-->

                        <?php 
                        $sql = "SELECT (COUNT(*) + 1) AS C FROM Tarifas_Boletos";
                        $noTarifa = 0;
                        $result = mysqli_query($conexion, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $noTarifa = $row["C"];
                        } ?>
                        <!--No. Tarifa-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                            <div class="form-group mt-2 mb-2">
                                <!--Bootstrap: Aplica CSS al label e input, añade margen arriba y abajo-->
                                <label for="txtNoTarifa" class="form-label">No. Tarifa</label>
                                <input type="number" class="form-control" name="txtNoTarifa" id="txtNoTarifa" <?php echo "value=" . $noTarifa . "" ?> readonly>
                            </div>
                        </div>
                        <!--Descripcion-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtDescripcion" class="form-label">Descripción</label>
                                <textarea rows="4" cols="50" class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Ingrese la descripción de la tarifa"></textarea>
                            </div>
                        </div>
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
                                    <input type="number" class="form-control" style="max-width: 380px; float: left;" name="txtPrecio" id="txtPrecio" value="0" min="0" step="0.01">
                                </div>
                            </div>
                        </div>
                        <!--Porcentaje Reajuste-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtPorcentaje" class="form-label">Porcentaje de Reajuste</label>
                                <div class="form-inline">
                                    <input type="number" class="form-control" style="max-width: 380px; float: left;" name="txtPorcentaje" id="txtPorcentaje" value="0" min="0" max="100">
                                    <p style="float: left; width: 20px;"></p>
                                    <p style="float: left; margin-top: 6px;">%</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--Botones-->
                            <div class="d-flex justify-content-center">
                                <button name="btnLimpiar" id="btnLimpiar" class="btn btn-secondary m-5">Limpiar</button>
                                <button onClick="return revisarOrigenDestino()" name="btnGuardar" id="btnGuardar" class="btn btn-primary m-5" style="background-color: #3987E3; border-color: #3987E3;">Guardar</button>
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