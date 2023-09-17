<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");
include("../../php/conexion.php");
//Llama a la conexión a la base de datos mediante conexion.php
date_default_timezone_set('America/El_Salvador');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">
    <title>Encomiendas Vendidas - KOMing</title>
    <!--Scripts-->
    <script type="text/javascript">
        function validar() {
            if (document.getElementById("txtIdentidad").value == "" && document.getElementById("txtGuia").value == "" && document.getElementById("txtViaje").value == "" && document.getElementById("cmbEstado").value == '') {
                alert("Debe ingresar una opción de filtrado");
                document.getElementById("txtGuia").focus();
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
            <h3 style="background-color: #3987E3; color: white;">Filtrar Encomiendas</h3>
        </div>
        <form name='formulario' id='formulario' method='POST' action="">
            <input type="hidden" name="accion" id="accion" value="">
            <div class="col-12">
                <div class="row">
                    <!--No. Boleto-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2">
                            <label for="txtIdentidad" class="form-label">No. Guia</label>
                            <input type="text" class="form-control" name="txtGuia" id="txtGuia" maxlength="15" placeholder="Ingrese el número de guía" value="">
                        </div>
                    </div>
                    <!--Cliente-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                        <div class="form-group mt-2">
                            <!--Bootstrap: Aplica CSS al label e input, añade margen arriba-->
                            <label for="txtIdentidad" class="form-label">No. Identidad del cliente que realizó la encomienda</label>
                            <input type="text" class="form-control" name="txtIdentidad" id="txtIdentidad" maxlength="15" placeholder="Ingrese la identidad del cliente" value="">
                        </div>
                    </div>
                    <!--Viaje-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                        <div class="form-group mt-2">
                            <!--Bootstrap: Aplica CSS al label e input, añade margen arriba-->
                            <label for="txtViaje" class="form-label">No. Viaje</label>
                            <input type="text" class="form-control" name="txtViaje" id="txtViaje" maxlength="15" placeholder="Ingrese el número de viaje" value="">
                        </div>
                    </div>
                    <!--Estado-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"></div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="form-group mt-2 mb-2">
                            <label for="cmbEstado" class="form-label">Estado</label>
                            <select class="form-control" name="cmbEstado" id="cmbEstado">
                                <option value="">-- Seleccione un Estado --</option>
                                <option value="1">Reclamado</option>
                                <option value="0">No Reclamado</option>
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
                            echo "<a class='btn btn-secondary m-3' href='form_filtroEncomienda.php'> Regresar</a>";
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
            $identidad = isset($_POST["txtGuia"]) ? $_POST["txtIdentidad"] : "";
            $guia = isset($_POST["txtGuia"]) ? $_POST["txtGuia"] : "";
            $viaje = isset($_POST["txtViaje"]) ? $_POST["txtViaje"] : "";
            $estado = isset($_POST["cmbEstado"]) ? $_POST["cmbEstado"] : "";
            if ($accion == "consultar") {
                $sql = '';
                if ($identidad != '') {
                    if ($sql == "") {
                        $sql = "SELECT * FROM v_Encomienda WHERE Id_Emisor = '$identidad' ";;
                    } else {
                        $sql = $sql . " AND Id_Emisor = '$identidad'";
                    }
                }
                if ($guia != '') {
                    if ($sql == "") {
                        $sql = "SELECT * FROM v_Encomienda WHERE Id_Guia = '$guia' ";
                    } else {
                        $sql = $sql . " AND Id_Guia = '$guia'";
                    }
                }
                if ($viaje != '') {
                    if ($sql == "") {
                        $sql = "SELECT * FROM v_Encomienda WHERE Id_Viaje = '$viaje' ";
                    } else {
                        $sql = $sql . " AND Id_Viaje = '$viaje'";
                    }
                }
                if ($estado != '') {
                    if ($sql == "") {
                        if ($estado == 1) {
                            $sql = "SELECT * FROM v_Encomienda WHERE Reclamada = '$estado'";
                        } else {
                            $sql = "SELECT * FROM v_Encomienda WHERE Reclamada = '$estado'";
                        }
                    } else {
                        if ($estado == 0) {
                            $sql = $sql . " AND Reclamada = 0";
                        } else {
                            $sql = $sql . " AND Reclamada = 1";
                        }
                    }
                }
                $sql = $sql . " ORDER BY Id_Guia";
                $result = mysqli_query($conexion, $sql);
                if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                    echo
                    "<thead>
                        <tr>
                            <th scope='col'>No. Guía</th>
                            <th scope='col'>No. Viaje</th>
                            <th scope='col'>No. Identidad del Emisor</th>
                            <th scope='col'>Terminal de Origen</th>
                            <th scope='col'>Terminal de Destino</th>
                            <th scope='col'>Estado</th>
                            <th style='text-align: center;' scope='col'>Ver</th>
                        </tr>
                        </thead>
                        <tbody>";

                    while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                        echo
                        "<tr>
						<th scope='row'>" . $row["Id_Guia"] . "</td>
                        <td scope='row'>" . $row["Id_Viaje"] . "</td>
						<td scope='row'>" . $row["Id_Emisor"] . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Origen"] . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Destino"] . "</td>";
                        if ($row['Reclamada'] == 1){
                            echo '<td>Reclamada </td>';
                        }else{
                            echo '<td> No Reclamada </td>';
                        }
                        echo "
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_verEncomienda.php?idGuia=" . $row["Id_Guia"] . "'>Ver Encomienda</a></td>
					    </tr>"; //El enlace redirecciona al formulario de actualizar, y mediante metodo GET envia el Id del Cliente
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
                $sql = "SELECT * FROM v_Encomienda";
                $result = mysqli_query($conexion, $sql);
                if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                    echo
                    "<thead>
                        <tr>
                            <th scope='col'>No. Guia</th>
                            <th scope='col'>No. Viaje</th>
                            <th scope='col'>No. Identidad del Emisor</th>
                            <th scope='col'>Terminal de Origen</th>
                            <th scope='col'>Terminal de Destino</th>
                            <th scope='col'>Estado</th>
                            <th style='text-align: center;' scope='col'>Ver</th>
                        </tr>
                        </thead>
                        <tbody>";

                    while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                        echo
                        "<tr>
                        <th scope='row'>" . $row["Id_Guia"] . "</td>
                        <td scope='row'>" . $row["Id_Viaje"] . "</td>
                        <td scope='row'>" . $row["Id_Emisor"] . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Origen"] . "</td>
                        <td scope='row'>" . $row["Nombre_Terminal_Destino"] . "</td>";
                        if ($row['Reclamada'] == 1){
                            echo '<td>Reclamada </td>';
                        }else{
                            echo '<td> No Reclamada </td>';
                        }
                        echo "
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_verEncomienda.php?idGuia=" . $row["Id_Guia"] . "'>Ver Encomienda</a></td>
					    </tr>"; //El enlace redirecciona al formulario de actualizar, y mediante metodo GET envia el Id del Cliente
                    }
                }
                echo "</table>"; //Cerrado de tabla
            }
            ?>
            </tbody>
        </table>
    </div>
    <br>
    <footer style="clear: both; position: relative; margin-top: 150px;">
        <!--Footer de la aplicacion-->
        <div style="background-color: #24242c; width: 1519px; height: 58px;"></div>
    </footer>
</body>

</html>