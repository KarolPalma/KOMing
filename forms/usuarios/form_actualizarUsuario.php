<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
include("../../php/usuarios/recuperarUsuario.php");
//Incluye el archivo php que recupera los datos de la BD mediante una vista para utilizar esos valores en los campos
include("../../php/usuarios/actualizarUsuario.php");
//Incluye el archivo php que actualiza o desactiva empleados en la BD cuando se cambia el campo de "accion" al valor de guardar o desactivar
if ($_SESSION["admin"] == 1) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Actualizar Usuario - KOMing</title>
        <script src="../../js/jquery-1.10.2.min.js"></script>
        <!--Libreria básica de JQuery-->
        <script src="../../js/usuarios/usuarios.js"></script>
        <!--Script de validación de campos-->]
    </head>

    <body>
        <!--Tanto los valores de Bootstrap como los de las variables escondidas se explican en el form_insertarEmpleado.php-->
        <div class="container">
            <div class="col-12 text-center mt-5 mb-5">
                <h3 style="background-color: #3987E3; color: white;">Actualizar Usuario</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action="">
                <input type="hidden" name="accion" id="accion" value="">
                <!--Modificar usuario a POST-->
                <input type="hidden" name="usuarioLogin" id="usuarioLogin" <?php echo "value='" . $_SESSION["idUsuario"] . "'" ?>>
                <div class="col-12">
                    <div class="row">
                        <!--Identidad-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtUsuario" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" maxlength="45" <?php echo 'value=' . $_GET['idUsuario'] ?> readonly>
                                <!--Un campo de solo lectura que tiene como valor la identidad traida del metodo GET-->
                            </div>
                        </div>
                        <!--Empleado-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="cmbEmpleado" class="form-label">Empleado</label>
                                <select class="form-control" name="cmbEmpleado" id="cmbEmpleado" disabled>
                                    <option value="">-- Seleccione un Empleado --</option>
                                    <!--Rellenado mediante BD-->
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                    <?php
                                    $sql = "SELECT Id_Empleado, Nombres, Apellidos FROM Empleados WHERE Id_Empleado = '$idEmpleado'";
                                    $result = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['Id_Empleado'] . "'>" . $row['Nombres'] . " " . $row['Apellidos'] . "</option>";
                                    }
                                    ?>
                                    <!-------------------------------------------------------------------------------------------------------------------------------------->
                                </select>
                            </div>
                        </div>
                        <!--Clave
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtClave" class="form-label">Clave</label>
                                <input type="password" class="form-control" name="txtClave" id="txtClave" maxlength="45" placeholder="Ingrese la clave del usuario"
                                <?php 
                                //echo "value='$clave'"?>>
                            </div>
                        </div>-->
                        <!--Fecha Registro-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="dtefregistro" class="form-label">Fecha de Registro</label>
                                <input type="date" class="form-control" name="dtefregistro" id="dtefregistro" <?php echo "value='$registro'" ?> readonly>
                                <!--Campo de fecha que utiliza la variable de nombres de recuperarEmpleado.php-->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                        <!--Fecha de Ultima Actualizacion-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="dtefactualizacion" class="form-label">Fecha de Última Actualización</label>
                                <input type="date" class="form-control" name="dtefactualizacion" id="dtefactualizacion" <?php echo "value='$actualizacion'" ?> readonly>
                                <!--Campo de fecha que utiliza la variable de registro de recuperarEmpleado.php-->
                            </div>
                        </div>
                        <!--Tipo de Usuario-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="cmbTipo" class="form-label">Tipo de Usuario</label>
                                <select class="form-control" name="cmbTipo" id="cmbTipo">
                                    <option value="">-- Seleccione un Tipo --</option>
                                    <?php
                                    if ($admin == 1) {
                                        echo "<option value='0'>Vendedor</option>";
                                        echo "<option selected value='1'>Administrador</option>";
                                        echo "<option value='2'>Conductor</option>";
                                    } else if ($admin == 0) {
                                        echo "<option selected value='0'>Vendedor</option>";
                                        echo "<option value='1'>Administrador</option>";
                                        echo "<option value='2'>Conductor</option>";
                                    }else if ($admin == 2){
                                        echo "<option value='0'>Vendedor</option>";
                                        echo "<option value='1'>Administrador</option>";
                                        echo "<option selected value='2'>Conductor</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <?php
                            if ($activo == 1) { //Si el empleado está como activo en la BD el boton será visible, si no, no
                                echo "<button onClick='return desactivar()' name='btnDesactivar' id='btnDesactivar' class='btn btn-secondary m-5' style='background-color: #E36039; border-color: #E36039;'>Desactivar</button>";
                                //Llama a la funcion desactivar() de usuarios.js
                                echo "<a class='btn btn-primary m-5' name='btnActualizar' id='btnActualizar' style='background-color: #36B844; border-color: #36B844;' href='../../forms/usuarios/form_actualizarClave.php?idUsuario=".$_GET['idUsuario']."'>Actualizar contraseña</a>";
                                echo "<button onclick='return validar()' name='btnGuardar' id='btnGuardar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Actualizar</button>";
                            }else{
                                echo "<button onclick='return validar()' name='btnGuardar' id='btnGuardar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Activar usuario</button>";
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