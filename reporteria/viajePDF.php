<?php
require('../recursos/fpdf/fpdf.php');

$idViaje = $_GET["idViaje"];
//Recolectar Detalle de Boleto.
require('../php/conexion.php');
include('../php/viajes/recuperarViaje.php');

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetTitle('Viaje No. ' . $idViaje);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(0, 115, 173);
$pdf->Image('../recursos/bus.PNG', 12, 10, 15);

$pdf->Cell(35);
$pdf->Cell(40, 10, 'Listado de Pasajeros y Encomiendas Guiadas del Viaje ' . $idViaje);
$pdf->Ln(20);

$x = $pdf->GetX();
$y = $pdf->GetY();

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(1, 1, 1);
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, 'Viaje No. ');
$pdf->SetXY($x + 60, $y);
$pdf->Cell(40, 10, 'Fecha de Salida: ');
$pdf->SetXY($x + 130, $y);
$pdf->Cell(40, 10, 'Hora de Salida: ');

$y = $y + 10;
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, 'Origen: ');

$y = $y + 10;
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, 'Destino: ');

$y = $y + 10;
$pdf->SetXY($x + 20, $y);
$pdf->Cell(40, 10, 'Chofer: ');
$pdf->SetXY($x + 110, $y);
$pdf->Cell(40, 10, 'Placa del Bus: ');

$y = $y + 10;
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, 'Capacidad Pasajeros: ');
$pdf->SetXY($x + 90, $y);
$pdf->Cell(40, 10, ' Capacidad Encomiendas: ');
$pdf->SetXY($x + 130, $y);
$y = $y + 10;
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, 'Cantidad Pasajeros: ');
$pdf->SetXY($x + 90, $y);
$pdf->Cell(40, 10, ' Volumen Encomiendas: ');
$pdf->SetXY($x + 130, $y);

$x = 10;
$y = 30;
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY($x + 30, $y);
$pdf->Cell(40, 10, $idViaje);
$pdf->SetXY($x + 90, $y);
$pdf->Cell(40, 10, date('d-m-Y', strtotime($fechaSalida)));
$pdf->SetXY($x + 160, $y);
$pdf->Cell(40, 10, date('h:i a', strtotime($horaSalida)));

$y = $y + 10;
$pdf->SetXY($x + 30, $y);
$pdf->Cell(40, 10, utf8_decode($nombreTerminalOrigen . ', ' . $nombreCiudadOrigen . ', ' . $nombrePaisOrigen));

$y = $y + 10;
$pdf->SetXY($x + 30, $y);
$pdf->Cell(40, 10, utf8_decode($nombreTerminalDestino . ', ' . $nombreCiudadDestino . ', ' . $nombrePaisDestino));


$y = $y + 10;
$pdf->SetXY($x + 40, $y);
$pdf->Cell(40, 10, $nombreChofer);
$pdf->SetXY($x + 140, $y);
$pdf->Cell(40, 10, $idBus);


$y = $y + 10;
$pdf->SetXY($x + 50, $y);
$pdf->Cell(40, 10, $capacidadBoletos);
$pdf->SetXY($x + 140, $y);
$pdf->Cell(40, 10, $capacidadEncomiendas);

$y = $y + 10;
$pdf->SetXY($x + 50, $y);
$pdf->Cell(40, 10, $boletos);
$pdf->SetXY($x + 140, $y);
$pdf->Cell(40, 10, $volumenEncomiendas);

$consulta = "SELECT Id_Boleto, Id_Cliente, Nombre, Numero_Asiento FROM v_Boleto WHERE Id_Viaje = '$idViaje' ORDER BY Id_Boleto";
$resultado = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($resultado) != 0) {
    $pdf->SetFont('Arial', 'B', 12);
    $y = $y + 20;
    $pdf->SetXY($x + 10, $y);
    $pdf->Cell(40, 10, 'Listado de Pasajeros');
    $pdf->Ln(12);

    $pdf->Cell(6);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(25, 10, 'No. Boleto', 1, 0, 'C', 0);
    $pdf->Cell(40, 10, 'Id del Cliente', 1, 0, 'C', 0);
    $pdf->Cell(80, 10, 'Nombre del Cliente', 1, 0, 'C', 0);
    $pdf->Cell(40, 10, 'No. Asiento', 1, 1, 'C', 0);


    $pdf->SetFont('Arial', '', 11);
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(6);
        $pdf->Cell(25, 10, utf8_decode($row["Id_Boleto"]), 1, 0, 'C', 0);
        $pdf->Cell(40, 10, utf8_decode($row["Id_Cliente"]), 1, 0, 'C', 0);
        $pdf->Cell(80, 10, utf8_decode($row["Nombre"]), 1, 0, 'C', 0);
        if($row["Numero_Asiento"] == 0){
            $pdf->Cell(40, 10,'Boleto Cancelado', 1, 1, 'C', 0);
        }else{
            $pdf->Cell(40, 10, utf8_decode($row["Numero_Asiento"]), 1, 1, 'C', 0);
        }
    }
    $x = $pdf->GetX();
    $y = $pdf->GetY();
}


$consulta = "SELECT Id_Guia, Id_Emisor, Id_Receptor, Volumen FROM v_Encomienda WHERE Id_Viaje = '$idViaje' ORDER BY Id_Guia";
$resultado = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($resultado) != 0) {
    $y = $y + 15;
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetXY($x + 10, $y);
    $pdf->Cell(40, 10, 'Listado de Encomiendas');
    $pdf->Ln(12);

    $pdf->Cell(6);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(35, 10, utf8_decode('No. Guía'), 1, 0, 'C', 0);
    $pdf->Cell(60, 10, 'Identidad del Emisor', 1, 0, 'C', 0);
    $pdf->Cell(60, 10, 'Identidad del Receptor', 1, 0, 'C', 0);
    $pdf->Cell(30, 10, 'Volumen', 1, 1, 'C', 0);

    $pdf->SetFont('Arial', '', 11);
    while ($row = $resultado->fetch_assoc()) {
        $pdf->Cell(6);
        $pdf->Cell(35, 10, utf8_decode($row["Id_Guia"]), 1, 0, 'C', 0);
        $pdf->Cell(60, 10, utf8_decode($row["Id_Emisor"]), 1, 0, 'C', 0);
        $pdf->Cell(60, 10, utf8_decode($row["Id_Receptor"]), 1, 0, 'C', 0);
        $pdf->Cell(30, 10, utf8_decode($row["Volumen"]), 1, 1, 'C', 0);
    }
        
    $x = $pdf->GetX();
    $y = $pdf->GetY();
}

$y = $y + 15;
$pdf->SetFont('Arial', '', 11);
$pdf->SetXY($x + 10, $y);
$pdf->Cell(40, 10, utf8_decode('Esta lista será entregada o reclamada por el chofer a cargo.                        Transportes KOMing'));

$pdf->Output('','Viaje No. '.$idViaje.'.pdf');

?>