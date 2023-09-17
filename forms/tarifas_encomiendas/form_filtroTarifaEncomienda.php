<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
if ($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
        <title>Tarifas de Encomiendas Registradas - KOMing</title>
        <script src="../../js/jquery-1.10.2.min.js"></script>
        <script src="../../js/paises/paisesOrigenDestino.js"></script>
        <!-- Utiliza las librerias de Bootstrap -->
        <!--Scripts-->
        <script type="text/javascript">
            function validar() {
                if (document.getElementById("cmbTerminalOrigen").value == "") {
                    alert("Por favor seleccione una terminal de origen para filtrar");
                    document.getElementById("cmbTerminalOrigen").focus();
                } else if (document.getElementById("cmbTerminalDestino").value == "") {
                    alert("Por favor seleccione una terminal de destino para filtrar");
                    document.getElementById("cmbTerminalDestino").focus();
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
                <h3 style="background-color: #3987E3; color: white;">Filtrar Tarifas de Encomiendas Registradas</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action="">
                <input type="hidden" name="accion" id="accion" value="">
                <div class="col-12">
                    <div class="row">
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
                                    <!--Se rellena mediante script paisesOrigenDestino.js, funcion cargarTerminales()-->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--Botones-->
                        <div class="d-flex justify-content-center">
                            <?php
                            $accion = isset($_POST["accion"]) ? $_POST["accion"] : ""; //La accion que cambia con la funcion validar()
                            if ($accion == "consultar") {
                                echo "<a class='btn btn-secondary m-3' href='form_filtroTarifaEncomienda.php'> Regresar</a>";
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
                $origen = isset($_POST["cmbTerminalOrigen"]) ? $_POST["cmbTerminalOrigen"] : "";
                $destino = isset($_POST["cmbTerminalDestino"]) ? $_POST["cmbTerminalDestino"] : "";
                if ($accion == "consultar") {
                    $sql = "SELECT TB.Id_Tarifa, TB.Volumen, C1.Nombre_Terminal AS Origen, C2.Nombre_Terminal AS Destino, TB.Precio
                        FROM v_Tarifas_Encomiendas AS TB INNER JOIN Terminales AS C1 ON TB.Id_Terminal_Origen = C1.Id_Terminal
                                                    INNER JOIN Terminales AS C2 ON TB.Id_Terminal_Destino = C2.Id_Terminal
                        WHERE TB.Id_Terminal_Origen = " . $origen . " AND TB.Id_Terminal_Destino = " . $destino . "
                        ORDER BY TB.Id_Tarifa;";
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>No. de Tarifa de Encomienda</th>
                            <th scope='col'>Volumen</th>
                            <th scope='col'>Terminal de Origen</th>
                            <th scope='col'>Terminal de Destino</th>
                            <th scope='col'>Precio</th>
                            <th style='text-align: center;' scope='col'>Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                            echo
                            "<tr>
                        <th scope='row'>" . $row["Id_Tarifa"] . "</th>
                        <td scope='row'>" . $row["Volumen"] . "</td>
                        <td scope='row'>" . $row["Origen"] . "</td>
                        <td scope='row'>" . $row["Destino"] . "</td>
                        <td scope='row'>$. " . $row["Precio"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_actualizarTarifaEncomienda.php?idTarifaEncomienda=" . $row["Id_Tarifa"] . "&Volumen=" . $row["Volumen"] . "'> Actualizar Tarifa</a></td>
                        </tr>"; //El enlace redirecciona al formulario de actualizar, y mediante metodo GET envia el Id de la tarifa
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
                    $sql = "SELECT TB.Id_Tarifa, TB.Volumen, C1.Nombre_Terminal AS Origen, C2.Nombre_Terminal AS Destino, TB.Precio
                        FROM v_Tarifas_Encomiendas AS TB INNER JOIN Terminales AS C1 ON TB.Id_Terminal_Origen = C1.Id_Terminal
                                                    INNER JOIN Terminales AS C2 ON TB.Id_Terminal_Destino = C2.Id_Terminal
                        ORDER BY TB.Id_Tarifa;";
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>No. de Tarifa de Encomienda</th>
                            <th scope='col'>Volumen</th>
                            <th scope='col'>Terminal de Origen</th>
                            <th scope='col'>Terminal de Destino</th>
                            <th scope='col'>Precio</th>
                            <th style='text-align: center;' scope='col'>Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                            echo
                            "<tr>
                        <th scope='row'>" . $row["Id_Tarifa"] . "</th>
                        <td scope='row'>" . $row["Volumen"] . "</td>
                        <td scope='row'>" . $row["Origen"] . "</td>
                        <td scope='row'>" . $row["Destino"] . "</td>
                        <td scope='row'>$. " . $row["Precio"] . "</td>
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_actualizarTarifaEncomienda.php?idTarifaEncomienda=" . $row["Id_Tarifa"] . "&Volumen=" . $row["Volumen"] . "'> Actualizar Tarifa</a></td>
                        </tr>"; //El enlace redirecciona al formulario de actualizar, y mediante metodo GET envia el Id de la tarifa
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