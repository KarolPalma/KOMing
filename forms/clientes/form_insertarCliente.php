<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
include("../../php/clientes/insertarCliente.php");
//Incluye el archivo php que inserta los datos a la BD cuando se cambia el campo de "accion" al valor de guardar
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
    <title>Insertar Cliente - KOMing</title>
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <!--Libreria básica de JQuery-->
    <script src="../../js/clientes/clientes.js"></script>
    <!--Script de validación de campos-->
    <script src="../../js/paises/paises.js"></script>
    <!--Script de actualización en tiempo real de selects de ciudades y terminales-->
</head>

<body>
    <div class="container">
        <div class="col-12 text-center mt-5 mb-5">
            <!--Bootstrap: Centrado de Texto y margenes arriba y abajo-->
            <h3 style="background-color: #3987E3; color: white;">Insertar Cliente</h3>
        </div>
        <form name='formulario' id='formulario' method='POST' action="">
            <input type="hidden" name="accion" id="accion" value="">
            <!--Accion que será cambiada por la funcion validar en clientes.js-->
            <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'"?>>
            <div class="col-12">
                <div class="row">
                    <!--Bootstrap: Divide en filas la pagina-->
                    <!--Identidad-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                        <div class="form-group mt-2 mb-2">
                            <!--Bootstrap: Aplica CSS al label e input, añade margen arriba y abajo-->
                            <label for="txtIdentidad" class="form-label">No. Identidad del Cliente</label>
                            <input type="text" class="form-control" name="txtIdentidad" id="txtIdentidad" maxlength="45" placeholder="Ingrese la identidad del cliente" value="">
                        </div>
                    </div>
                    <!--Nombres-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtNombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="txtNombres" id="txtNombres" maxlength="45" placeholder="Ingrese el nombre del cliente" value="">
                        </div>
                    </div>
                    <!--Apellidos-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtApellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="txtApellidos" id="txtApellidos" maxlength="45" placeholder="Ingrese los apellidos del cliente" value="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Nacimiento-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="dtefnac" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" name="dtefnac" id="dtefnac" value="">
                        </div>
                    </div>
                    <!--Genero-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbGenero" class="form-label">Género</label>
                            <select class="form-control" name="cmbGenero" id="cmbGenero">
                                <option value="">-- Seleccione un Género --</option>
                                <!--Rellenado mediante BD-->
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $sql = "SELECT Id_Genero, Genero FROM Generos";
                                $result = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['Id_Genero'] . "'>" . $row['Genero'] . "</option>";
                                }
                                ?>
                                <!-------------------------------------------------------------------------------------------------------------------------------------->
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Pais-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbPais" class="form-label">País</label>
                            <select class="form-control" name="cmbPais" id="cmbPais">
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
                    <!--Ciudad-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="ciudad">
                            <label for='cmbCiudad' class='form-label'>Ciudad</label>
                            <select class='form-control' name='cmbCiudad' id='cmbCiudad'>
                                <!--Se rellena mediante scrip paises.js, funcion cargarCiudades()-->
                            </select>
                        </div>
                    </div>
                    <!--Terminal-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2" id="terminal">
                            <label for='cmbTerminal' class='form-label'>Terminal</label>
                            <select class='form-control' name='cmbTerminal' id='cmbTerminal'>
                                <!--Se rellena mediante script paises.js, funcion cargarTerminales()-->
                            </select>
                        </div>
                    </div>
                    <!--Dirección-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtDireccion" class="form-label">Dirección</label>
                            <textarea rows="4" cols="50" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Ingrese la dirección del cliente"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <!--Correo-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtEmail" class="form-label">Correo Electrónico</label>
                            <input style="float: left;" type="email" class="form-control" name="txtEmail" id="txtEmail" maxlength="45" placeholder="Ingrese el correo electrónico del cliente" value="">
                        </div>
                    </div>
                    <!--Telefono-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtTelefono" class="form-label">Número Teléfonico</label>
                            <input style="float: left;" type="text" class="form-control" name="txtTelefono" id="txtTelefono" maxlength="45" placeholder="Ingrese el teléfono del cliente" value="">
                        </div>
                    </div>
                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <button name="btnLimpiar" id="btnLimpiar" class="btn btn-secondary m-5">Limpiar</button>
                            <button onClick="return revisarIdentidad()" name="btnGuardar" id="btnGuardar" class="btn btn-primary m-5" style="background-color: #3987E3; border-color: #3987E3;">Guardar</button>
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