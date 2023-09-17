<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
session_start();
include("../../php/conexion.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - KOMing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!--Scripts-->
    <script src="../../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        function corroborarUsuario() {
            var clave = document.getElementById("txtPass").value;
            var usuario = document.getElementById("txtUsuario").value;
            if (clave == "" || usuario == "") {
                alert("Por favor rellene todos los campos");
            } else if (clave != "" && usuario != "") {
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
                            return consultarIngreso();
                        } else {
                            alert("El usuario o clave ingresados no son válidos");
                        }
                    });
            }
            return false
        }

        function consultarIngreso() {
            var usuario = document.getElementById("txtUsuario").value;
            if (usuario == "") {
                alert("Favor rellene todos los campos");
            } else if (usuario != "") {
                $.ajax({
                        type: 'POST',
                        url: '../../php/principal/consultaIngreso.php',
                        data: {
                            empleado_usuario: usuario
                        },
                        dataType: 'html'
                    })
                    .done(function(respuesta) {
                        if (respuesta == 1) {
                            document.getElementById("respuesta").value = 1
                            return document.getElementById("formulario").submit();
                        } else {
                            document.getElementById("respuesta").value = 0
                            return document.getElementById("formulario").submit();
                        }
                    });

            }
            return false;
        }
    </script>
    <!--Fin Scripts-->

</head>

<body>
    <div class="container">
        <br><br><br><br>
        <div class="col-12 text-center mt-4 mb-3">
            <img src="../../recursos/bus.PNG" alt="Logo de Smart Market" style="max-width: 100px;">
        </div>
        <div class="col-12 text-center mt-3 mb-5">
            <h3>Login</h3>
        </div>
        <form name='formulario' id='formulario' method='POST' action="login.php">
            <input type="hidden" name="respuesta" id="respuesta" <?php echo 'value=' . $_POST["respuesta"] ?>>
            <div class="col-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                    <!--Usuario-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtUsuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" maxlength="45" placeholder="Ingrese su Usuario" <?php echo 'value=' . $_POST["txtUsuario"] ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                    <!--Clave-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="txtPass" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="txtPass" id="txtPass" maxlength="45" placeholder="Contraseña del usuario" <?php echo 'value=' . $_POST["txtPass"] ?>>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"></div>

                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <button name="btnGuardar" id="btnGuardar" class="btn btn-primary m-5" style="background-color: #3987E3; border-color: #3987E3;" onclick="return corroborarUsuario()">Ingresar</button>
                        </div>
                    </div>
                </div>
        </form>
        <?php
        $_SESSION["idUsuario"] = $_POST["txtUsuario"];
        if ($_POST["respuesta"] == 1 && $_SESSION["idUsuario"] != '') {
            echo "<script>document.getElementById('formulario').action = 'principal.php';
                        document.getElementById('formulario').submit();</script>";
        } else if ($_POST["respuesta"] == 0 && $_SESSION["idUsuario"] != '') {
            echo "<script>document.getElementById('formulario').action = 'cambioClave.php';
                        document.getElementById('formulario').submit();</script>";
        }
        ?>
    </div>
</body>

</html>