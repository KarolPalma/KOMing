<?php 
    include("../conexion.php");

    $c=0;
    $sql="SELECT Clave_Cambiada AS c FROM Usuarios WHERE Id_Usuario = '".$_POST["empleado_usuario"]."'";

    $result=mysqli_query($conexion,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $c=$row["c"];
    }
    echo $c;
?>