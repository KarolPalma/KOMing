<?php
error_reporting(E_ERROR | E_PARSE); // Eliminar Advertencias de Error
include("../menu/menu.php");

$cierre = isset($_POST["cierreCaja"]) ? $_POST["cierreCaja"] : ""; //Recupera la accion
if ($cierre == "cierre") {
  echo "<script>window.open('../../reporteria/cierrePDF.php?idUsuario=" . $_SESSION["idUsuario"] . "', '_blank');</script>";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="../../recursos/bus.ico" rel="shortcut icon" type="image/x-icon">

  <title>Inicio - KOMing</title>

  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <link href="../../css/one-page-wonder.min.css" rel="stylesheet">

  <script>
    function cierre() {
      alert("Será redireccionado al PDF de cierre de caja del día de hoy en una nueva pestaña");
      document.getElementById('cierreCaja').value = 'cierre';
      document.getElementById('cierre').submit();
      return false;
    }
  </script>

</head>

<body>

  <header class="head text-white mt-5" style="background-color: #3987E3; padding-top: 30px; padding-bottom: 30px;">
    <div class="masthead-content">
      <div class="container">
        <h1 class="masthead-heading mb-0" style="margin-left: 7%">Bienvenido a</h1>
        <h2 class="masthead-subheading mb-0" style="margin-left: 7%">KOMing</h2>
        <?php 
        if (($_SESSION["admin"] == 1 || $_SESSION["cargo"] == 3) || ($_SESSION["admin"] == 0 || $_SESSION["cargo"] == 1)) {

        ?>
        <form class="form-inline my-2 my-lg-0" id="cierre" method="POST" action="">
          <input type="hidden" name='cierreCaja' id="cierreCaja" value="">
          <button onclick="return cierre()" class="btn btn-primary" style="background-color: #2C69B1; border-color: #2C69B1; margin-top: -80px; margin-left: 1070px; position: absolute;">Cierre de Caja</button>
        </form>
        <?php

        }
        ?>

        <p style="padding-right: 105px; margin-top: -30px; margin-bottom: -5px; float: right;"><?php echo $_SESSION["nombreEmpleado"] ?></p>
        <img class="img-fluid" width="100px" style="margin-left: -30%; margin-top: -13%;" src="../../recursos/bus.png" alt="">
      </div>

    </div>
  </header>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid" src="../../recursos/03.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-1">
          <div class="p-5">
            <h2 class="display-10">Principios de KOMing</h2>
            <p style="text-align: justify;">Nuestra objetivo principal consiste en brindar a nuestros clientes una opción de transporte de alta calidad satisfaciendo de manera eficiente las necesidades del mercado y complacer a las personas que nos apoyan, brindándoles en nuestro servicio el transporte y gestión de encomiendas a nivel regional.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="p-5">
            <img class="img-fluid" src="../../recursos/02.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <h2 class="display-10">Acerca de KOMing</h2>
            <p style="text-align: justify;">KOMing se desarrolló con la principal idea de automatizar y mejorar el método de transacciones de venta de boletos y encomiendas y consulta de las mismas, así como permitir la administración total de las entidades involucradas en el proceso de compra y venta de una boletería de transporte terrestre.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 order-lg-2">
          <div class="p-5">
            <img class="img-fluid" src="../../recursos/01.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 order-lg-0">
          <div class="p-5">
            <h2 class="display-10">Otras características del sistema</h2>
            <p style="text-align: justify;">La interfaz gráfica de usuario proporcionara de forma intuitiva las distintas opciones para la venta de boletos y encomiendas asi mismo con la opción de proporcionar la reportería de las entidades utilizando los datos en la base de datos con actualización paulatina.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5" style="background-color: #24242c;">
    <div class="container">
      <p class="m-0 text-center text-white small">Copyright &copy; KOMing 2023 - Proyecto Final</p>
    </div>
  </footer>
</body>

</html>