<?php

$headers   = '';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: estudio@fotodary.com". "\r\n";;
$headers .= "Reply-To: estudio@fotodary.com". "\r\n";;
$headers .= "X-Mailer: PHP/".phpversion();

$message = 'Nombre: ' . $_POST['name'] . '<br>';
$message .= ' Email: ' . $_POST['email'] . '<br>';
$message .= ' Asunto: ' . $_POST['subject'] . '<br>';
$message .= ' Mensaje: ' . $_POST['message'] . '<br>';

$res = mail('fotodary@hotmail.com', 'Nuevo Contacto', $message, $headers);

return $res;