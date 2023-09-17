<?php 
    //Consulta PHP para la revision de terminal origen y destino de tarifasBoletos.js
    include("../conexion.php");
    //Se incluye la conexion a la BD
    $origen = $_POST["terminal_origen"];
    $destino = $_POST["terminal_destino"];
    $c = 0; //Variable de conteo
    $sql = "SELECT COUNT(*) AS c FROM Tarifas_Boletos WHERE Id_Terminal_Origen = '$origen' AND Id_Terminal_Destino = '$destino' AND ((Id_Tarifa % 2) <> 0)"; 

    $result = mysqli_query($conexion,$sql); //Ejecuta el query
    while($row=mysqli_fetch_assoc($result)) //Recorre la respuesta por cada registro
    {
        $c = $row["c"]; //Si no hay registros c=0, pero si hay (el caso maximo es que haya un registro) c=1
    }
    echo $c; //Devuelve c como una respuesta HTML que es recojida por AJAX que determinara que hacer si el valor es 0 o 1
?>