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
        <title>Empleados Registrados - KOMing</title>
        <!--Scripts-->
        <script type="text/javascript">
            function validar() {
                if (document.getElementById("txtIdentidad").value == "" && document.getElementById("cmbEstado").value == '' && document.getElementById("cmbCargo").value == '') {
                    alert("Por favor seleccione un método de filtrado");
                    document.getElementById("txtIdentidad").focus();
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
                <h3 style="background-color: #3987E3; color: white;">Filtrar Empleados</h3>
            </div>
            <form name='formulario' id='formulario' method='POST' action="">
                <input type="hidden" name="accion" id="accion" value="">
                <div class="col-12">
                    <div class="row">
                        <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                        <!--Empleado-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <!--Bootstrap: Divide en columnas la fila, de 12 columnas este div esta destinado a abarcar 4 columnas-->
                            <div class="form-group mt-2">
                                <!--Bootstrap: Aplica CSS al label e input, añade margen arriba-->
                                <label for="txtIdentidad" class="form-label">No. Identidad del Empleado</label>
                                <input type="text" class="form-control" name="txtIdentidad" id="txtIdentidad" maxlength="15" placeholder="Ingrese la identidad del empleado" value="">
                            </div>
                        </div>
                        <!--Cargo-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="cmbCargo" class="form-label">Cargo</label>
                                <select class="form-control" name="cmbCargo" id="cmbCargo">
                                    <option value="">-- Seleccione un Cargo --</option>
                                    <option value="1">Vendedor</option>
                                    <option value="2">Conductor</option>
                                    <option value="3">Gerente</option>
                                </select>
                            </div>
                        </div>
                        <!--Estado-->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2 mb-2">
                                <label for="cmbEstado" class="form-label">Estado</label>
                                <select class="form-control" name="cmbEstado" id="cmbEstado">
                                    <option value="">-- Seleccione un Estado --</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
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
                                echo "<a class='btn btn-secondary m-3' href='form_filtroEmpleado.php'> Regresar</a>";
                            }
                            ?>
                            <button onClick="return validar()" name="btnBuscar" id="btnBuscar" class="btn btn-primary m-3" style="background-color: #3987E3; border-color: #3987E3; ">Buscar</button>
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
                $identidad = isset($_POST["txtIdentidad"]) ? $_POST["txtIdentidad"] : "";
                $cargo = isset($_POST["cmbCargo"]) ? $_POST["cmbCargo"] : "";
                $estado = isset($_POST["cmbEstado"]) ? $_POST["cmbEstado"] : "";
                if ($accion == "consultar") {

                    $sql = "SELECT * FROM V_Empleado WHERE Id_Empleado = '$identidad'";

                    $sql = '';
                    if ($identidad != '') {
                        if ($sql == "") {
                            $sql = "SELECT * FROM V_Empleado WHERE Id_Empleado = '$identidad'";
                        }
                    }
                    if ($cargo != '') {
                        if ($sql == "") {
                            $sql = "SELECT * FROM V_Empleado WHERE Id_Cargo = '$cargo' ";
                        } else {
                            $sql = $sql . " AND Id_Cargo = '$cargo'";
                        }
                    }
                    if ($estado != '') {
                        if ($sql == "") {
                            if ($estado == 1) {
                                $sql = "SELECT * FROM V_Empleado WHERE Activo = '$estado'";
                            } else {
                                $sql = "SELECT * FROM V_Empleado WHERE Activo = '$estado'";
                            }
                        } else {
                            if ($estado == 0) {
                                $sql = $sql . " AND Activo = 0";
                            } else {
                                $sql = $sql . " AND Activo = 1";
                            }
                        }
                    }
                    $sql = $sql . " ORDER BY Id_Empleado";

                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>No. de Identidad</th>
                            <th scope='col'>Nombre Completo</th>
                            <th scope='col'>Cargo</th>
                            <th scope='col'>Estado</th>
                            <th style='text-align: center;' scope='col'>Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                            echo
                            "<tr>
						<th scope='row'>" . $row["Id_Empleado"] . "</th>
						<td>" . $row["Nombres"] . " " . $row["Apellidos"] . "</td>";
                        if ($row['Id_Cargo'] == 1){
                            echo '<td>Vendedor </td>';
                        }else if ($row['Id_Cargo'] == 2){
                            echo '<td> Conductor </td>';
                        }else{
                            echo '<td> Gerente </td>';
                        }
                        if ($row['Activo'] == 1){
                            echo '<td>Activo </td>';
                        }else{
                            echo '<td> Inactivo </td>';
                        }
                        echo "
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_actualizarEmpleado.php?idEmpleado=" . $row["Id_Empleado"] . "'> Actualizar Empleado</a></td>
					    </tr>"; //El enlace redirecciona al formulario de actualizar, y mediante metodo GET envia el Id del empleado
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
                    $sql = "SELECT * FROM Empleados";
                    $result = mysqli_query($conexion, $sql);
                    if (mysqli_num_rows($result) != 0) { //Si la respuesta contiene por lo menos un registro, imprime la tabla
                        echo
                        "<thead>
                        <tr>
                            <th scope='col'>No. de Identidad</th>
                            <th scope='col'>Nombre Completo</th>
                            <th scope='col'>Cargo</th>
                            <th scope='col'>Estado</th>
                            <th style='text-align: center;' scope='col'>Actualizar</th>
                        </tr>
                        </thead>
                        <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) { //Imprime los registros que concuerdan con la consulta $sql
                            echo
                            "<tr>
                        <th scope='row'>" . $row["Id_Empleado"] . "</th>
                        <td>" . $row["Nombres"] . " " . $row["Apellidos"] . "</td>";
                        if ($row['Id_Cargo'] == 1){
                            echo '<td>Vendedor </td>';
                        }else if ($row['Id_Cargo'] == 2){
                            echo '<td> Conductor </td>';
                        }else{
                            echo '<td> Gerente </td>';
                        }
                        if ($row['Activo'] == 1){
                            echo '<td>Activo </td>';
                        }else{
                            echo '<td> Inactivo </td>';
                        }
                        echo "
                        <td style='text-align: center'><a class='btn btn-primary' style='background-color: #3987E3; border-color: #3987E3;' href='form_actualizarEmpleado.php?idEmpleado=" . $row["Id_Empleado"] . "'> Actualizar Empleado</a></td>
                        </tr>"; //El enlace redirecciona al formulario de actualizar, y mediante metodo GET envia el Id del empleado
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