<?php 
    include("../conexion.php");
    $origen = $_POST['origen'];
    $destino = $_POST['destino']; 
    $c = 0; 
    $sql = "SELECT COUNT(*) AS c FROM v_Tarifas_Boletos WHERE Id_Terminal_Origen = '$origen' AND Id_Terminal_Destino = '$destino'"; 

    $result = mysqli_query($conexion,$sql); 
    while($row=mysqli_fetch_assoc($result)) 
    {
        $c = $row["c"]; 
    }
    echo $c;
?>