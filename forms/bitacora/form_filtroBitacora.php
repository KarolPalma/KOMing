<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
if ($_SESSION["admin"] == 1) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <title>Bitacora - KOMing</title>
        <!--Scripts-->
        <script type="text/javascript">
            function validar() {
                if (document.getElementById("txtidUsuario").value == "" && document.getElementById("dtefechaRegistro").value == "" && document.getElementById("txtRegistro").value == "") {
                    alert("Debe ingresar una opción de filtrado");
                    document.getElementById("txtidUsuario").focus();
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
                <h3 style="background-color: #3987E3; color: white;">Filtrar Bitacoras</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action="">
                <input type="hidden" name="accion" id="accion" value="">
                <div class="col-12">
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2"></div>
                    <div class="row">
                        <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                        <!--No. Registro-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="txtRegistro" class="form-label">No. Registro</label>
                                <input type="text" class="form-control" name="txtRegistro" id="txtRegistro" maxlength="15" placeholder="Ingrese el número del registro" value="">
                            </div>
                        </div>
                        <!--Id. Usuario-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="txtidUsuario" class="form-label">Id del Usuario</label>
                                <input type="text" class="form-control" name="txtidUsuario" id="txtidUsuario" placeholder="Ingrese el Id del Usuario">
                                <!--Un campo de solo lectura que tiene como valor la identidad traida del metodo GET-->
                            </div>
                        </div>
                        <!--Fecha del Registro-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                            <div class="form-group mt-2">
                                <!--Bootstrap: Aplica CSS al label e input, añade margen arriba-->
                                <label for="dtefechaRegistro" class="form-label">Fecha del Registro</label>
                                <input type="date" class="form-control" name="dtefechaRegistro" id="dtefechaRegistro" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <?php
                            $accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //La accion que cambia con la funcion validar()
                            if ($accion == "consultar") {
                                echo "<a class='btn btn-secondary m-3' href='form_filtroBitacora.php'> Regresar</a>";
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
                $fechaRegistro = isset($_POST["dtefechaRegistro"]) ? $_POST["dtefechaRegistro"] : "";
                $idUsuario = isset($_POST["txtidUsuario"]) ? $_POST["txtidUsuario"] : "";
                $idRegistro = isset($_POST["txtRegistro"]) ? $_POST["txtRegistro"] : "";
                if ($accion == "consultar") {
                    $sql = '';
                    if ($_POST["dtefechaRegistro"] != "" && $_POST["txtidUsuario"] == "") {
                        $sql = "SELECT *, date_format(Fecha,'%d/%m/%Y') as fecha FROM Bitacora WHERE Fecha = '$fechaRegistro'";
                    } else if ($_POST["txtidUsuario"] != "" && $_POST["dtefechaRegistro"] == "") {
                        $sql = "SELECT *, date_format(Fecha,'%d/%m/%Y') as fecha FROM Bitacora WHERE Id_Usuario = '$idUsuario'";
                    } else if ($_POST["txtidUsuario"] != "" && $_POST["dtefechaRegistro"] != "") {
                        $sql = "SELECT *, date_format(Fecha,'%d/%m/%Y') as fecha FROM Bitacora WHERE Id_Usuario = '$idUsuario' AND Fecha = '$fechaRegistro'";
                    }else if($idRegistro != ""){
                        $sql = "SELECT *, date_format(Fecha,'%d/%m/%Y') as fecha FROM Bitacora WHERE Id_Registro = '$idRegistro'";
                    }
                    $sql = $sql . " ORDER BY Id_Registro";
                    //echo "sql ".$sql;
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>No. Registro</th>
                            <td scope='col'>Fecha</td>
                            <td scope='col'>Usuario</td>
                            <th style='text-align: center;' scope='col'>Visualizar</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                            echo
                            "<tr>
						<th scope='row'>" . $row["Id_Registro"] . "</th>
						<td>" . $row["fecha"] . "</td>
                        <td>" . $row["Id_Usuario"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_vistaBitacora.php?idRegistro=" . $row["Id_Registro"] . "'> Visualizar Registro</a></td>
					    </tr>"; //El enlace redirecciona al formulario de visualizar, y mediante metodo GET envia el Id del Registro
                        }
                    }
                    echo "</table>"; //Cerrado de tabla
                    if (mysqli_num_rows($result) == 0) { //Si la respuesta no contiene ningun registro, imprime que no hay resultados
                        echo
                        "<div class='col-12 text-center mt-5 mb-5'>
                        <p>No se encontraron resultados</p>
                    </div>";
                    }
                } else {
                    $sql = "SELECT *, date_format(Fecha,'%d/%m/%Y') as fecha FROM Bitacora";
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>No. Registro</th>
                            <td scope='col'>Fecha</td>
                            <td scope='col'>Usuario</td>
                            <th style='text-align: center;' scope='col'>Visualizar</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                            echo
                            "<tr>
                        <th scope='row'>" . $row["Id_Registro"] . "</th>
                        <td>" . $row["fecha"] . "</td>
                        <td>" . $row["Id_Usuario"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_vistaBitacora.php?idRegistro=" . $row["Id_Registro"] . "'> Visualizar Registro</a></td>
                        </tr>"; //El enlace redirecciona al formulario de visualizar, y mediante metodo GET envia el Id del Registro
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
<?php
} else { //Pagina que se carga cuando se trata de acceder con la url sin ser administrador
    echo "<script>
            window.location.href = '../../forms/principal/principal.php';
        </script>";
}
?>