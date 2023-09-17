<?php
require('../recursos/fpdf/fpdf.php');

$idGuia = $_GET['idGuia'];
//Recolectar Detalle de Encomienda.
require('../php/conexion.php');
include('../php/encomiendas/recuperarEncomienda.php');

$tarifa ='';
if ($idTarifa%2 == 0) {
    $tarifa = 'Reajuste';
} else {
    $tarifa = 'Normal';
}

$pdf = new FPDF('L','mm',array(105, 230));
$pdf -> SetTitle('Guia No. ' . $idGuia);
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
$pdf -> Image('../recursos/bus.PNG',12,5,15);
$pdf -> MultiCell(0,2, utf8_decode('Compra:           ' . date('d-m-Y', strtotime($fechaEnvio))), 0,1);
$pdf -> SetXY($x+102,$y+6);
$pdf -> MultiCell(0,2, utf8_decode(date('h:i a', strtotime($horaEnvio))), 0,1);

$pdf -> SetXY($x+82,$y+19);
$pdf -> MultiCell(0,2, utf8_decode('No. Volumen:  ' . $volumen), 0,1);
$pdf -> SetXY($x+82,$y+26);
$pdf -> MultiCell(0,2, utf8_decode('Tipo de Tarifa: ' . $tarifa), 0,1);
$pdf -> SetXY($x+82,$y+33);
$pdf -> MultiCell(0,2, utf8_decode('Precio:            $. ' . $precio), 0,1);

$pdf -> SetXY(0,15);
$pdf -> Ln(5);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',10);

$pdf -> Cell(2);
$pdf -> Cell(0,10,'ENCOMIENDA                                 No. Guia:     ' . $idGuia, 0,1);
$pdf -> Ln(-2);

$pdf -> Cell(3);
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Multicell(0,7,'Nombre del Emisor',0,1);
$pdf -> SetXY($x+55,$y);
$pdf -> Cell(0,7,'No. Identidad del Emisor',0,1);

$pdf -> Ln(-5);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> Cell(3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(0,10,utf8_decode($nombreEmisor),0,1);
$pdf -> SetXY($x+55,$y);
$pdf -> Cell(0,10,utf8_decode($idEmisor),0,1);

$pdf -> Cell(3);
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Multicell(0,4,'Nombre del Receptor',0,1);
$pdf -> SetXY($x+55,$y);
$pdf -> Cell(0,4,'No. Identidad del Receptor',0,1);

$pdf -> Ln(-5);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> Cell(3);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Cell(0,13,utf8_decode($nombreReceptor),0,1);
$pdf -> SetXY($x+55,$y);
$pdf -> Cell(0,13,utf8_decode($idReceptor),0,1);

$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','B',9);

$pdf -> Cell(3);
$pdf -> Cell(0,1,'Detalles de Viaje No. ' . $idViaje,0,1);
$pdf -> Ln(-5);


$pdf -> Cell(3);
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Multicell(0,16,'De',0,1);
$pdf -> SetXY($x+79,51);
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
$pdf -> SetXY($x+79,$y+2);
$pdf -> Cell(0,10,'Placa de Bus',0,1);
$pdf -> SetXY($x+85,$y+6);
$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> Cell(0,10,utf8_decode($idBus),0,1);


//Lado Derecho
$pdf -> SetTextColor(0, 115, 173);
$pdf ->SetFont('Arial','B',9);
$pdf -> SetXY(156,5);
$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf -> Multicell(0,10,'No. Identidad del Emisor',0,1);
$pdf -> SetXY($x,$y+10);
$pdf -> Cell(0,10,'No. Identidad del Receptor',0,1);
$pdf -> SetXY($x,$y+20);
$pdf -> Multicell(0,10,'De',0,1);
$pdf -> SetXY($x,$y+35);
$pdf -> Multicell(0,10,'Hacia',0,1);
$pdf -> SetXY($x,$y+50);
$pdf -> Multicell(0,10,'Fecha y Hora de Partida',0,1);
$pdf -> SetXY($x,$y+60);
$pdf -> Multicell(0,10,'Guia No. ' . $idGuia,0,1);
$pdf -> SetXY($x,$y+65);
$pdf -> Multicell(0,10,'Viaje No. ' . $idViaje,0,1);
$pdf -> SetXY($x,$y+69.9);
$pdf -> Multicell(0,10,'Volumen No. ' . $volumen,0,1);
$pdf -> SetXY($x+32,$y+60);
$pdf -> Multicell(0,10,'Placa de Bus',0,1);


$pdf -> SetTextColor(1, 1, 1);
$pdf ->SetFont('Arial','',9);
$pdf -> SetXY(165,0);
$pdf -> SetXY($x,$y+5);
$pdf -> Multicell(0,10,utf8_decode($idEmisor),0,1);
$pdf -> SetXY($x,$y+15);
$pdf -> Multicell(0,10,utf8_decode($idReceptor),0,1);
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
$pdf -> SetXY($x+37,$y+65);
$pdf -> Multicell(0,10,utf8_decode($idBus),0,1);


if($reclamada == 1){ //Si la encomienda esta reclamada
    $pdf -> Image('../recursos/reclamado.PNG',100,70,50);
    $pdf -> Image('../recursos/reclamado.PNG',170,70,50);

    $pdf->Output('Encomiendas/Guia No. '.$idGuia.'.pdf','F');

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
    $mail->addAddress($correoEmisor, $nombreEmisor); //Correo del cliente emisor
    $mail->addAddress($correoReceptor, $nombreReceptor); //Correo del cliente receptor
    $mail->addAttachment('Encomiendas/Guia No. '.$idGuia.'.pdf', 'Guia No. '.$idGuia.'.pdf');
    
    // Enviar el correo electrónico
    $mail->Subject = 'Guia de encomienda digital No. '. $idGuia.' reclamada';
    $mail->isHTML(true);
    $mail->Body = '
        <html>
        <head>
        <title>Guía digital No. '.$idGuia.' reclamada.</title>
        </head>
        <body>
        <h1>Guía digital No. '.$idGuia.' reclamada.</h1>
        <p style="font-size: 15px;">Se ha reclamada la guía digital No. '.$idGuia.'.</p>
        <p style="font-size: 15px;">Envíado el día '.date('d-m-Y', strtotime($fechaEnvio)). ', '.$horaEnvio.'.</p>
        <p style="font-size: 15px;">Saliendo el víaje el día '.date('d-m-Y', strtotime($fechaSalida)). ', '.$horaSalida.'.</p>
        <p style="font-size: 15px;">El emisor en el punto de origen fue '.$nombreEmisor.'.</p>
        <p style="font-size: 15px;">El receptor en el punto de destino fue '.$nombreReceptor.'.</p>
        <p style="font-size: 15px; font-style: italic;" >Gracias por viajar y preferir a Ticabus.</p>
        </body>
        </html>
    ';
    
    if ($mail->send()) {
        //echo 'El correo electrónico se envió correctamente.';
        $pdf->Output('','Guia No. '.$idGuia.'.pdf');
    } else {
        echo 'Hubo un error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}else{ // Encomienda no reclamada

    $pdf->Output('Encomiendas/Guia No. '.$idGuia.'.pdf','F');

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
    $mail->addAddress($correoEmisor, $nombreEmisor); //Correo del cliente emisor
    $mail->addAddress($correoReceptor, $nombreReceptor); //Correo del cliente receptor
    $mail->addAttachment('Encomiendas/Guia No. '.$idGuia.'.pdf', 'Guia No. '.$idGuia.'.pdf');
    
    // Enviar el correo electrónico
    $mail->Subject = 'Compra de la guia de encomienda digital No. '. $idGuia;
    $mail->isHTML(true);
    $mail->Body = '
        <html>
        <head>
        <title>Guía digital No. '.$idGuia.'</title>
        </head>
        <body>
        <h1>Guía digital No. '.$idGuia.'</h1>
        <p style="font-size: 15px;">Se ha enviado la guía digital No. '.$idGuia.' en un documento PDF.</p>
        <p style="font-size: 15px;">Comprado el día '.date('d-m-Y', strtotime($fechaEnvio)). ', '.$horaEnvio.'.</p>
        <p style="font-size: 15px;">El emisor en el punto de origen es '.$nombreEmisor.'.</p>
        <p style="font-size: 15px;">El receptor en el punto de destino es '.$nombreReceptor.'.</p>
        <p style="font-size: 15px;">El viaje está programado para el día '.date('d-m-Y', strtotime($fechaSalida)).', '.$horaSalida.'.</p>
        <p style="font-size: 15px; font-style: italic;" >Gracias por viajar y preferir a Ticabus.</p>
        </body>
        </html>
    ';
    
    if ($mail->send()) {
        //echo 'El correo electrónico se envió correctamente.';
        $pdf->Output('','Guia No. '.$idGuia.'.pdf');
    } else {
        echo 'Hubo un error al enviar el correo electrónico: ' . $mail->ErrorInfo;
    }
}

?>