<?php
session_start();
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../../php/conexion.php");

if (isset($_SESSION["idUsuario"])) { //Esto evita que se pueda regresar al sistema con el boton de regresar del navegador una vez se haya destruido la sesion
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <title>Cambiar Clave - KOMing</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <!--Scripts-->
        <script src="../../js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript">
            function revisarClaveOriginal() {
                var clave = document.getElementById("txtPassActual").value;
                var usuario = document.getElementById("txtUsuario").value;
                if (clave != "" && usuario != "") {
                    $.ajax({
                            type: 'POST',
                            url: '../../php/principal/consultaClave.php',
                            data: {
                                empleado_usuario: usuario,
                                empleado_clave: clave
                            },
                            dataType: 'html'
                        })
                        .done(function(respuesta) {
                            if (respuesta == 1) {
                                document.getElementById("accion").value = "guardar";
                                document.getElementById("formulario").submit();
                            } else {
                                alert("El valor de la clave actual ingresada no es válido");
                            }
                        });
                }
                return false
            }

            function validar() {
                if (document.getElementById("txtPassActual").value == "") {
                    alert("Favor ingrese su clave predeterminada");
                    document.getElementById("txtPassActual").focus();
                } else if (document.getElementById("txtPassNuevo").value == "") {
                    alert("Favor ingrese una nueva clave");
                    document.getElementById("txtPassNuevo").focus();
                } else if (document.getElementById("txtPassNConf").value == "") {
                    alert("Favor ingrese la corroboración de su nueva clave");
                    document.getElementById("txtPassNConf").focus();
                } else if (document.getElementById("txtPassNuevo").value != document.getElementById("txtPassNConf").value) {
                    alert("La nueva contraseña no coincide, ingresela de nuevo");
                    document.getElementById("txtPassNConf").focus();
                } else {
                    return revisarClaveOriginal();
                }
                return false;
            }
        </script>
        <!--Fin Scripts-->

    </head>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <?php
    $accion = isset($_POST["accion"]) ? $_POST["accion"] : "";
    if ($accion == "guardar") {
        $contrasenia = password_hash($_POST["txtPassNuevo"], PASSWORD_DEFAULT); //Encripta contraseña
        $sql = "UPDATE Usuarios SET Clave = '$contrasenia', Clave_Cambiada = 1 WHERE Id_Usuario = '" . $_POST["txtUsuario"] . "'";
        //Guardado
        $resultado = mysqli_query($conexion, $sql);
        echo "<script>alert('Información guardada satisfactoriamente');</script>";
        session_destroy();
        echo "<script>
                window.location.href = 'login.php';
          </script>";
    }
    ?>
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <body>
        <div class="container">
            <br><br>
            <div class="col-12 text-center mt-5 mb-5">
                <h3>Cambio de Clave</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action=''>
                <input type="hidden" name="accion" id="accion" value="">
                <input type="hidden" name="txtUsuario" id="txtUsuario" value="<?php echo $_POST["txtUsuario"] ?>">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                        <!--Mensaje-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <p>Al ser su primera vez ingresando al sistema debe cambiar la clave predeterminada de su usuario.</p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                        <!--Clave Actual-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtPassActual" class="form-label">Clave Actual</label>
                                <input type="password" class="form-control" name="txtPassActual" id="txtPassActual" maxlength="45" placeholder="Contraseña actual">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                        <!--Nueva Clave-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtPassNuevo" class="form-label">Nueva Clave</label>
                                <input type="password" class="form-control" name="txtPassNuevo" id="txtPassNuevo" maxlength="45" placeholder="Contraseña nueva">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                        <!--Confirmar Clave-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtPassNConf" class="form-label">Confirmar Nueva Clave</label>
                                <input type="password" class="form-control" name="txtPassNConf" id="txtPassNConf" maxlength="45" placeholder="Confirmación">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>

                        <div class="row">
                            <!--Botones-->
                            <div class="d-flex justify-content-center">
                                <button name="btnGuardar" id="btnGuardar" class="btn btn-primary m-5" style="background-color: #3987E3; border-color: #3987E3;" onclick="return validar()">Guardar</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </body>

    </html>
<?php
} else { //Pagina que se carga cuando se trata de acceder una vez destruida la sesion, lleva a la pagina del login
    echo "<script>
            window.location.href = '../../forms/principal/login.php';
        </script>";
}
?>