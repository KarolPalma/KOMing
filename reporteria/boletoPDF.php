<?php
require('../recursos/fpdf/fpdf.php');

$idBoleto = $_GET["idBoleto"];
$actualizado = $_GET["Actualizado"];
//Recolectar Detalle de Boleto.
require('../php/conexion.php');
include('../php/boletos/recuperarBoleto.php');

$tarifa ='';
if ($idTarifa%2 == 0) {
    $tarifa = 'Reajuste';
} else {
    $tarifa = 'Normal';
}
$fechaActual = date('Y-m-d');
$pdf = new FPDF('L','mm',array(105, 230));
$pdf -> SetTitle('Boleto No. ' . $idBoleto);
$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 18);
$pdf -> SetTextColor(0, 115, 173);
$pdf -> Image('../recursos/Plantilla.jpg',0,0,230,105);
$pdf -> Image('../recursos/bus.PNG',12,5,15);
$pdf -> Cell(20);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(0,2, utf8_decode('Transportes KOMing'), 0,1);
$pdf -> SetXY($x+80,$y);
$pdf -> SetTextColor(1, 1, 1);
$pdf -> SetFont('Arial','',9);
$pdf -> Image('../recursos/bus.PNG',210,5,15);
$pdf -> MultiCell(0,2, utf8_decode('Compra:           ' . date('d-m-Y', strtotime($fechaCompra))), 0,1);
$pdf -> SetXY($x+102,$y+6);
$pdf -> MultiCell(0,2, utf8_decode(date('h:i a', strtotime($horaCompra))), 0,1);

$pdf -> SetXY($x+80,$y+19);
$pdf -> MultiCell(0,2, utf8_decode('No. Boleto:         ' . $idBoleto), 0,1);
$pdf -> SetXY($x+80,$y+26);
$pdf -> MultiCell(0,2, utf8_decode('Tipo de Tarifa:    ' . $tarifa), 0,1);
$pdf -> SetXY($x+80,$y+33);
$pdf -> MultiCell(0,2, utf8_decode('Precio:                $. ' . $precio), 0,1);

$pdf -> SetXY(0,19);
$pdf -> Ln(5);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',10);

$pdf -> Cell(3);
$pdf -> Cell(0,10,'BOLETO PERSONAL',0,1);
$pdf -> Ln(-2);

$pdf -> Cell(3);
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Multicell(0,10,'Nombre',0,1);
$pdf -> SetXY($x+55,$y);
$pdf -> Cell(0,10,'No. Identidad',0,1);

$pdf -> Ln(-5);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> Cell(3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(0,10,utf8_decode($nombre),0,1);
$pdf -> SetXY($x+55,$y);
$pdf -> Cell(0,10,utf8_decode($idCliente),0,1);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','B',9);

$pdf -> Cell(3);
$pdf -> Cell(0,10,'Detalles de Viaje No. ' . $idViaje,0,1);
$pdf -> Ln(-5);


$pdf -> Cell(3);
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Multicell(0,10,'De',0,1);
$pdf -> SetXY($x+80,51);
$pdf -> Cell(0,10,'Fecha y Hora de Partida',0,1);

$pdf -> Ln(-5);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> Cell(3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(0,10,utf8_decode($nombreTerminalOrigen . ', ' . $nombreCiudadOrigen . ', ' . $nombrePaisOrigen),0,1);
$pdf -> SetXY($x+85,$y);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> MultiCell(0,10,utf8_decode(date('d-m-Y', strtotime($fechaSalida))),0,1);
$pdf -> SetXY($x,$y+10);
$pdf -> MultiCell(0,2, utf8_decode(date('h:i a', strtotime($horaSalida))), 0,1);

$pdf -> Cell(3);
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> SetXY($x,$y-6);
$pdf -> Multicell(0,10,'Hacia',0,1);
$pdf -> Ln(-5);
$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> Cell(3);
$pdf -> Cell(0,10,utf8_decode($nombreTerminalDestino . ', ' . $nombreCiudadDestino . ', ' . $nombrePaisDestino),0,1);

$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$pdf -> SetXY($x+80,$y+2);
$pdf -> Cell(0,10,'Placa de Bus ',0,1);
$pdf -> SetXY($x+107,$y+2);
if($numReservaAsiento == 0){
    $pdf -> Cell(0,10,'Reservacion ',0,1);  
}else{
    $pdf -> Cell(0,10,'No. de Asiento ',0,1);  
}

$pdf -> SetXY($x+85,$y+6);
$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> Cell(0,10,utf8_decode($idBus),0,1);
$pdf -> SetXY($x+107,$y+6);
if ($numReservaAsiento != 0){
    $pdf -> Multicell(0,10,utf8_decode($numReservaAsiento),0,1);
}else{
    $pdf -> SetTextColor(0, 115, 173);
    $pdf ->SetFont('Arial','B',9);
    $pdf -> Multicell(0,10,utf8_decode('cancelada'),0,1);
}


//Lado Derecho
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$pdf -> SetXY(156,5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Multicell(0,10,'Nombre',0,1);
$pdf -> SetXY($x,$y+10);
$pdf -> Cell(0,10,'No. Identidad',0,1);
$pdf -> SetXY($x,$y+20);
$pdf -> Multicell(0,10,'De',0,1);
$pdf -> SetXY($x,$y+35);
$pdf -> Multicell(0,10,'Hacia',0,1);
$pdf -> SetXY($x,$y+50);
$pdf -> Multicell(0,10,'Fecha y Hora de Partida',0,1);
$pdf -> SetXY($x,$y+60);
$pdf -> Multicell(0,10,'Viaje No. ' . $idViaje,0,1);
$pdf -> SetXY($x,$y+65);
$pdf -> Multicell(0,10,'Boleto No. ' . $idBoleto,0,1);
$pdf -> SetXY($x,$y+69.9);
if ($numReservaAsiento == 0){
    $pdf -> Multicell(0,10,'Reservacion cancelada',0,1);
}else{
    $pdf -> Multicell(0,10,'Asiento  No.  ' . $numReservaAsiento,0,1);
}

$pdf -> SetXY($x+32,$y+60);
$pdf -> Multicell(0,10,'Placa de Bus',0,1);


$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> SetXY(165,0);
$pdf -> SetXY($x,$y+5);
$pdf -> Multicell(0,10,utf8_decode($nombre),0,1);
$pdf -> SetXY($x,$y+15);
$pdf -> Multicell(0,10,utf8_decode($idCliente),0,1);
$pdf -> SetXY($x,$y+25);
$pdf -> Cell(0,10,utf8_decode($nombreTerminalOrigen),0,1);
$pdf -> SetXY($x,$y+30);
$pdf -> Cell(0,10,utf8_decode($nombreCiudadOrigen . ', ' . $nombrePaisOrigen),0,1);
$pdf -> SetXY($x,$y+40);
$pdf -> Cell(0,10,utf8_decode($nombreTerminalDestino),0,1);
$pdf -> SetXY($x,$y+45);
$pdf -> Cell(0,10,utf8_decode($nombreCiudadDestino . ', ' . $nombrePaisDestino),0,1);
$pdf -> SetXY($x+5,$y+55);
$pdf -> Multicell(0,10,utf8_decode(date('d-m-Y', strtotime($fechaSalida)) . '                   ' . date('h:i a', strtotime($horaSalida))),0,1);
$pdf -> SetXY($x+39,$y+65);
$pdf -> Multicell(0,10,utf8_decode($idBus),0,1);

//$pdf->Output('','Boleto No. '.$idBoleto.'.pdf');

if($numReservaAsiento == 0){ //Boleto Cancelado
    $pdf -> Image('../recursos/cancelado.PNG',100,70,50);
    $pdf -> Image('../recursos/cancelado.PNG',170,70,50);
    $pdf->Output('Boletos/Boleto No. '.$idBoleto.'.pdf', 'F');
    require '../recursos/PHPMailer/PHPMailer.php';
    require '../recursos/PHPMailer/SMTP.php';

    // Configurar PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ticabusbusiness@gmail.com';
    $mail->Password = 'spqukwgiddhiqfwk';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('ticabusbusiness@gmail.com', 'Ticabus');
    $mail->addAddress($correo, $nombre); //Correo del cliente
    $mail->addAttachment('Boletos/Boleto No. '.$idBoleto.'.pdf', 'Boleto No. '.$idBoleto.'.pdf');

    // Enviar el correo electrónico
    $mail->Subject = 'Cancelacion del boleto digital No. '. $idBoleto;
    $mail->isHTML(true);
    $mail->Body = '
        <html>
        <head>
        <title>Cancelación de reservación del Boleto digital No. '.$idBoleto.'</title>
        </head>
        <body>
        <h1>Cancelación de reservación del Boleto digital No. '.$idBoleto.'</h1>
        <p style="font-size: 15px;">Se ha cancelado la reservación del boleto digital No. '.$idBoleto.'.</p>
        <p style="font-size: 15px; font-style: italic;" >Gracias por viajar y preferir a Ticabus.</p>
        </body>
        </html>
    ';
    if ($mail->send()) {
        //echo 'El correo electrónico se envió correctamente.';
        $pdf->Output('','Boleto No. '.$idBoleto.'.pdf');
    } else {
        echo 'Hubo un error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }

}else if($actualizado == 1){ //Actualizado el boleto
    $pdf->Output('Boletos/Boleto No. '.$idBoleto.'.pdf', 'F');
    require '../recursos/PHPMailer/PHPMailer.php';
    require '../recursos/PHPMailer/SMTP.php';
    // Configurar PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ticabusbusiness@gmail.com';
    $mail->Password = 'spqukwgiddhiqfwk';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('ticabusbusiness@gmail.com', 'Ticabus');
    $mail->addAddress($correo, $nombre); //Correo del cliente
    $mail->addAttachment('Boletos/Boleto No. '.$idBoleto.'.pdf', 'Boleto No. '.$idBoleto.'.pdf');
    
    // Enviar el correo electrónico
    $mail->Subject = 'Actualizacion de reserva de asiento del boleto digital No. '. $idBoleto;
    $mail->isHTML(true);
    $mail->Body = '
        <html>
        <head>
        <title>Actualización de reserva de asiento del boleto digital No. '.$idBoleto.'</title>
        </head>
        <body>
        <h1>Actualización de reserva de asiento del boleto digital No. '.$idBoleto.'</h1>
        <p style="font-size: 15px;">Se ha enviado el boleto digital No. '.$idBoleto.' en un documento PDF actualizando la reservación de asiento.</p>
        <p style="font-size: 15px;">Comprado el día '.date('d-m-Y', strtotime($fechaCompra)). ', '.$horaCompra.'.</p>
        <p style="font-size: 15px;">Su nuevo número de asiento es el '.$numReservaAsiento.'.</p>
        <p style="font-size: 15px;">El viaje está programado para el día '.date('d-m-Y', strtotime($fechaSalida)).', '.$horaSalida.' y debe estar en el autobús 45 minutos antes de la hora de partida.</p>
        <p style="font-size: 15px; font-style: italic;" >Gracias por viajar y preferir a Ticabus.</p>
        </body>
        </html>';
    
    if ($mail->send()) {
        //echo 'El correo electrónico se envió correctamente.';
        $pdf->Output('','Boleto No. '.$idBoleto.'.pdf');
    } else {
        echo 'Hubo un error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}
else if(!($fechaActual < $fechaSalida)){ //Boletos usados
    $pdf -> Image('../recursos/usado.PNG',100,75,50);
    $pdf -> Image('../recursos/usado.PNG',170,75,50);
    $pdf->Output('', 'Boletos/Boleto No. '.$idBoleto.'.pdf');
}else{ //Generar boleto y enviarlo al correo
    $pdf->Output('Boletos/Boleto No. '.$idBoleto.'.pdf', 'F');
    require '../recursos/PHPMailer/PHPMailer.php';
    require '../recursos/PHPMailer/SMTP.php';
    // Configurar PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ticabusbusiness@gmail.com';
    $mail->Password = 'spqukwgiddhiqfwk';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('ticabusbusiness@gmail.com', 'Ticabus');
    $mail->addAddress($correo, $nombre); //Correo del cliente
    $mail->addAttachment('Boletos/Boleto No. '.$idBoleto.'.pdf', 'Boleto No. '.$idBoleto.'.pdf');
    
    // Enviar el correo electrónico
    $mail->Subject = 'Compra del boleto digital No. '. $idBoleto;
    $mail->isHTML(true);
    $mail->Body = '
        <html>
        <head>
        <title>Boleto digital No. '.$idBoleto.'</title>
        </head>
        <body>
        <h1>Boleto digital No. '.$idBoleto.'</h1>
        <p style="font-size: 15px;">Se ha enviado el boleto digital No. '.$idBoleto.' en un documento PDF.</p>
        <p style="font-size: 15px;">Comprado el día '.date('d-m-Y', strtotime($fechaCompra)). ', '.$horaCompra.'.</p>
        <p style="font-size: 15px;">Su número de asiento es el '.$numReservaAsiento.'.</p>
        <p style="font-size: 15px;">El viaje está programado para el día '.date('d-m-Y', strtotime($fechaSalida)).', '.$horaSalida.' y debe estar en el autobús 45 minutos antes de la hora de partida.</p>
        <p style="font-size: 15px; font-style: italic;" >Gracias por viajar y preferir a Ticabus.</p>
        </body>
        </html>';
    
    if ($mail->send()) {
        //echo 'El correo electrónico se envió correctamente.';
        $pdf->Output('','Boleto No. '.$idBoleto.'.pdf');
    } else {
        echo 'Hubo un error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}

?>