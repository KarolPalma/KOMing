<?php 
    include("../conexion.php");

    $c=0;

    $sql="SELECT COUNT(*) AS c, Id_Usuario, Clave FROM Usuarios WHERE Id_Usuario = '" . $_POST["empleado_usuario"] . "'";
    //$sql="SELECT COUNT(*) AS c FROM Usuarios WHERE Id_Usuario = '" . $_POST["empleado_usuario"] . "' AND Clave = '" . $_POST["empleado_clave"] . "'";

    $result=mysqli_query($conexion,$sql);
    $row=mysqli_fetch_assoc($result);
    $claveHash=$row['Clave'];
    $verificar=password_verify($_POST["empleado_clave"], $claveHash);
    if ($verificar){
        $c=$row["c"];
    }
    echo $c;

    /*while($row=mysqli_fetch_assoc($result))
    {
        $c=$row["c"];
    }*/
?>