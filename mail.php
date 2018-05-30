<?php
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"), true);
$frames = json_decode($data['marcos'], true);
if(isset($data['nombre'])){       
    $body = '<html><body>';
    $body .= '<table style="width: 500px; margin: 0 auto;">';
    $body .= '<tr><th colspan="4" style="text-align:center; background-color: #e2e2e2;">Solicitud de Cotizacion</th></tr>';
    $body .= '<tr><th style="text-align:right; width:110px;">Nombre:</th>';
    $body .= '<td colspan="3" style="padding-left: 12px">' . $data['nombre'] . '</td></tr>';
    $body .= '<tr><th style="text-align:right;">Teléfono:</th>';
    $body .= '<td colspan="3" style="padding-left: 12px">' . $data['telefono'] . '</td></tr>';
    $body .= '<tr><th style="text-align:right;">Email:</th>';
    $body .= '<td colspan="3" style="padding-left: 12px">' . $data['email'] . '</td></tr>';
    $body .= '<tr><th style="text-align:right;">Ciudad:</th>';
    $body .= '<td colspan="3" style="padding-left: 12px">' . $data['ciudad'] . '</td></tr>';
    $body .= '<tr><th style="text-align:right;">Estado:</th>';
    $body .= '<td colspan="3" style="padding-left: 12px">' . $data['estado'] . '</td></tr>';
    $body .= '<tr><th style="text-align:right;">Comentarios:</th>';
    $body .= '<td colspan="3" style="padding-left: 12px">' . $data['comentarios'] . '</td></tr>';
    $body .= '<tr><td colspan="4">&nbsp;</td></tr>';
    $body .= '<tr><th style="text-align:left">Cantidad</th><th style="text-align:left">Descripcion</th><th style="text-align:left">Precio U.</th><th style="text-align:left">Importe</th></tr>';
    $total = 0;
    foreach ($frames as $key => $value) {
        foreach ($value['detail'] as $key2 => $value2) {
            if($value2['checked']){
                $body .= '<tr><td>' . $value2['quantity'] . '</td>';
                $body .= '<td>' . $value['model'] . ' ' . $value2['width'] .' x '. $value2['height'] .'</td>';
                $body .= '<td>' . $value2['price'] . '</td>';
                $body .= '<td>' . $value2['price'] * $value2['quantity']  . '</td></tr>';
                $total += ($value2['price'] * $value2['quantity']);
            }
        }    
    }
    $body .= '<tr><td></td><td></td><th style="text-align: right;">TOTAL:</th><td style="text-align: center; font-size: 18px;">$' . $total . '</td></tr>';
    $body .= '';
    $body .= '</table>';
    $body .= '</body></html>';

    $headers   = '';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "From: estudio@fotodary.com". "\r\n";
    $headers .= "Reply-To: estudio@fotodary.com". "\r\n";
    $headers .= "X-Mailer: PHP/".phpversion();

    $res = mail('fotodary@hotmail.com', 'Cotizacion', $body, $headers);
    return $res;
}


