<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
include("../../php/buses/recuperarBus.php");
//Incluye el archivo php que recupera los datos de la BD mediante una vista para utilizar esos valores en los campos
include("../../php/buses/actualizarBus.php");
//Incluye el archivo php que actualiza o desactiva buses en la BD cuando se cambia el campo de "accion" al valor de guardar o desactivar
if ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) {
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <title>Actualizar Bus - KOMing</title>
        <script src="../../js/jquery-1.10.2.min.js"></script>
        <!--Libreria básica de JQuery-->
        <script src="../../js/buses/buses.js"></script>
        <!--Script de validación de campos-->
        <script src="../../js/paises/paises.js"></script>
        <!--Script de actualización en tiempo real de selects de departamentos y ciudades-->
    </head>

    <body>
        <!--Tanto los valores de Bootstrap como los de las variables escondidas se explican en el form_insertarBus.php-->
        <div class="container">
            <div class="col-12 text-center mt-5 mb-5">
                <h3 style="background-color: #3987E3; color: white;">Actualizar Bus</h3>
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
                                <label for="txtID" class="form-label">No. ID del Bus</label>
                                <input type="text" class="form-control" name="txtID" id="txtID" maxlength="15" placeholder="Ingrese la ID del bus" <?php echo 'value="' . $_GET['idBus'] . '"' ?> readonly>
                                <!--Un campo de solo lectura que tiene como valor la identidad traida del metodo GET-->
                            </div>
                        </div>
                        <!--Marca-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtMarca" class="form-label">Marca</label>
                                <input type="text" class="form-control" name="txtMarca" id="txtMarca" maxlength="45" placeholder="Ingrese la marca del bus" <?php echo "value='$marca'" ?>>
                                <!--Campo que utiliza la variable de nombres de recuperarBus.php-->
                            </div>
                        </div>
                        <!--Modelo-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtModelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" name="txtModelo" id="txtModelo" maxlength="45" placeholder="Ingrese el modelo del bus" <?php echo "value='$modelo'" ?>>
                                <!--Campo que utiliza la variable de apellidos de recuperarBus.php-->
                            </div>
                        </div>
                        <!--Color-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtColor" class="form-label">Color</label>
                                <input type="text" class="form-control" name="txtColor" id="txtColor" maxlength="45" placeholder="Ingrese el color del bus" <?php echo "value='$color'" ?>>
                                <!--Campo que utiliza la variable de apellidos de recuperarBus.php-->
                            </div>
                        </div>
                        <!--Capacidad de Personas-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtCPersonas" class="form-label">Capacidad de Personas</label>
                                <input type="text" class="form-control" name="txtCPersonas" id="txtCPersonas" maxlength="45" placeholder="Ingrese la Capacidad de Personas" <?php echo "value='$cPersonas'" ?>>
                                <!--Campo que utiliza la variable de apellidos de recuperarBus.php-->
                            </div>
                        </div>
                        <!--Capacidad de Encomiendas-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtCEncomiendas" class="form-label">Capacidad de Encomiendas</label>
                                <input type="text" class="form-control" name="txtCEncomiendas" id="txtCEncomiendas" maxlength="45" placeholder="Ingrese la Capacidad de Encomiendas" <?php echo "value='$cEncomiendas'" ?>>
                                <!--Campo que utiliza la variable de apellidos de recuperarBus.php-->
                            </div>
                        </div>

                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <?php
                            if ($activo == 1) { //Si el bus está como activo en la BD el boton será visible, si no, no
                                echo "<button onClick='return desactivar()' name='btnDesactivar' id='btnDesactivar' class='btn btn-secondary m-5' style='background-color: #E36039; border-color: #E36039;'>Desactivar</button>";
                                //Llama a la funcion desactivar() de buses.js
                                echo "<button onclick='return validar()' name='btnGuardar' id='btnGuardar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Actualizar</button>";
                            }else{
                                echo "<button onclick='return validar()' name='btnGuardar' id='btnGuardar' class='btn btn-primary m-5' style='background-color: #3987E3; border-color: #3987E3;'>Activar bus</button>";
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