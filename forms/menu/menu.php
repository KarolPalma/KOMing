<?php
session_start();
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include('../../php/conexion.php');
if (isset($_SESSION["idUsuario"])) {
    $sql = "SELECT * FROM v_UsuarioLogin WHERE Id_Usuario = '" . $_SESSION["idUsuario"] . "'";
    $result = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["idEmpleado"] = $row["Id_Empleado"];
        $_SESSION["nombreEmpleado"] = $row["Nombre"];
        $_SESSION["cargo"] = $row["Id_Cargo"];
        $_SESSION["admin"] = $row["Administrador"];
    }
}
//Recupera el valor del campo administrador del usuario que inicio sesion para determinar las funciones del menu a las que podra acceder
$logout = isset($_POST["logout"]) ? $_POST["logout"] : ""; //Recupera la accion
if ($logout == "salir") { //Si paso se preciono el boton de Logout tendra el boton salir y sino estara vacio
    session_destroy();
    echo "<script>
            window.location.href = '../../forms/principal/login.php';
        </script>";
}

if (isset($_SESSION["idUsuario"])) { //Esto evita que se pueda regresar al sistema con el boton de regresar del navegador una vez se haya destruido la sesion
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Utiliza las librerias de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <style>
            .dropdown-item {
                color: white;
            }

            .dropdown-item:hover {
                background-color: #3987E3;
            }

            .btn-outline-success {
                border-color: #3987E3;
                color: #3987E3;
            }

            .btn-outline-success:hover {
                color: white;
                background-color: #3987E3;
            }

            .sub-menu {
                display: none;
                margin-left: 40px;
                padding-left: 150px;
            }

            .menu-btn:hover{
                border: none;
                outline: none;
            }

            .menu-btn:hover + .sub-menu {
                outline: none;
                border: none;
                display: block;
            }

        </style>
        <script>
            function salir() {
                document.getElementById('logout').value = 'salir';
                document.getElementById('salir').submit();
                return false;
            }
            const menuBtn = document.querySelector('.menu-btn');
            const subMenu = document.querySelector('.sub-menu');

            menuBtn.addEventListener('mouseenter', function() {
            subMenu.style.display = 'block';
            });

            menuBtn.addEventListener('mouseleave', function() {
            subMenu.style.display = 'none';
            });
        </script>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" style="margin-left: 20px;" href="../principal/principal.php">KOMing</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!--Inicio-->
                    <li class="nav-item active">
                        <a class="nav-link" href="../principal/principal.php">Inicio</span></a>
                    </li>
                    <!--Boleteria-->
                    <?php
                    if (($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) || ($_SESSION["admin"] == 0 || $_SESSION["cargo"] == 1)) { //Si no es administrador o vendedor no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Boletería
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: white;" href="../../forms/boletos/form_venderBoleto.php">Venta de Boleto</a>
                    
                    <?php
                    }
                     if (($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) || ($_SESSION["admin"] == 0 || $_SESSION["cargo"] == 1)) { //Si no es administrador o vendedor no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?> 
                            <div class="dropdown-divider" style="background-color: white;"></div>
                            <a class="dropdown-item" style="color: white;" href="../../forms/boletos/form_filtroBoleto.php">Búsqueda</a>
                        </div>
                    </li>
                    <?php
                    }
                    if (($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) || ($_SESSION["admin"] == 0 || $_SESSION["cargo"] == 1)) { //Si no es administrador o vendedor no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                    <!--Encomiendas-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Encomiendas
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: white;" href="../../forms/encomiendas/form_venderEncomienda.php">Venta de Guía</a>
                            <div class="dropdown-divider" style="background-color: white;"></div>
                            <a class="dropdown-item" style="color: white;" href="../../forms/encomiendas/form_filtroEncomienda.php">Búsqueda</a>
                        </div>
                    </li>
                    <?php
                    }
                    if ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                        <!--Clientes-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Clientes
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color: white;" href="../../forms/clientes/form_insertarCliente.php">Registrar Cliente</a>
                                <div class="dropdown-divider" style="background-color: white;"></div>
                                <a class="dropdown-item" style="color: white;" href="../../forms/clientes/form_filtroCliente.php">Búsqueda</a>
                            </div>
                        </li>
                        <!--Tarifas-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tarifas
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color: white;" href="../../forms/tarifas_boletos/form_insertarTarifaBoleto.php">Añadir Tarifa de Boleto</a>
                                <a class="dropdown-item" style="color: white;" href="../../forms/tarifas_boletos/form_filtroTarifaBoleto.php">Búsqueda</a>
                                <div class="dropdown-divider" style="background-color: white;"></div>
                                <a class="dropdown-item" style="color: white;" href="../../forms/tarifas_encomiendas/form_insertarTarifaEncomienda.php">Añadir Tarifa de Encomienda</a>
                                <a class="dropdown-item" style="color: white;" href="../../forms/tarifas_encomiendas/form_filtroTarifaEncomienda.php">Búsqueda</a>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                        <!--Viajes-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Viajes
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                    <?php
                    if ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                                <a class="dropdown-item" style="color: white;" href="../../forms/viajes/form_insertarViaje.php">Añadir un Viaje</a>
                                <div class="dropdown-divider" style="background-color: white;"></div>
                    <?php
                    }
                    ?>
                                <a class="dropdown-item" style="color: white;" href="../../forms/viajes/form_filtroViaje.php">Búsqueda</a>
                            </div>
                        </li>
                    <?php
                    if ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                        <!--Buses-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Buses
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color: white;" href="../../forms/buses/form_insertarBus.php">Añadir un Bus</a>
                                <div class="dropdown-divider" style="background-color: white;"></div>
                                <a class="dropdown-item" style="color: white;" href="../../forms/buses/form_filtroBus.php">Búsqueda</a>
                            </div>
                        </li>
                        <!--Empleados-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Empleados
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color: white;" href="../../forms/empleados/form_insertarEmpleado.php">Añadir un Empleado</a>
                                <div class="dropdown-divider" style="background-color: white;"></div>
                                <a class="dropdown-item" style="color: white;" href="../../forms/empleados/form_filtroEmpleado.php">Búsqueda</a>
                            </div>
                        </li>
                    <?php
                    }
                    if ($_SESSION["admin"] == 1) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                        <!--Usuarios-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuarios
                            </a>
                            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color: white;" href="../../forms/usuarios/form_insertarUsuario.php">Añadir un Usuario</a>
                                <div class="dropdown-divider" style="background-color: white;"></div>
                                <a class="dropdown-item" style="color: white;" href="../../forms/usuarios/form_filtroUsuario.php">Búsqueda</a>
                            </div>
                        </li>
                        <!--Bitacora-->
                        <li class="nav-item active">
                            <a class="nav-link" href="../../forms/bitacora/form_filtroBitacora.php">Bitacora</span></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0" id="salir" method="POST" action="">
                    <input type="hidden" name='logout' id="logout" value="">
                    <?php
                    if ($_SESSION["admin"] == 1) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                        <button onclick="return salir()" class="btn btn-outline-success menu-btn" style="margin-top: -20px; margin-left: 400px; position: absolute;">Logout</button>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION["admin"] == 0 && $_SESSION["cargo"] == 1) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                        <button onclick="return salir()" class="btn btn-outline-success" style="margin-top: -20px; margin-left: 920px; position: absolute;">Logout</button>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION["admin"] == 0 && $_SESSION["cargo"] == 3) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                        <button onclick="return salir()" class="btn btn-outline-success" style="margin-top: -20px; margin-left: 575px; position: absolute;">Logout</button>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION["admin"] == 2 && $_SESSION["cargo"] == 2) { //Si no es administrador no puede entrar a esta funcion, por lo que no se muestra en el menu
                    ?>
                        <button onclick="return salir()" class="btn btn-outline-success" style="margin-top: -20px; margin-left: 1100px; position: absolute;">Logout</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
            </div>
        </nav>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else { //Pagina que se carga cuando se trata de acceder una vez destruida la sesion, lleva a la pagina del login
    echo "<script>
            window.location.href = '../../forms/principal/login.php';
        </script>";
}
?>