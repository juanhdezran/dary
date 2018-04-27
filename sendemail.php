<?php

$headers   = '';
$headers .= "From: estudio@fotodary.com";
$headers .= "Reply-To: estudio@fotodary.com";
$headers .= "X-Mailer: PHP/".phpversion();

$message = 'Nombre: ' . $_POST['name'];
$message .= ' Email: ' . $_POST['email'];
$message .= ' Asunto: ' . $_POST['subject'];
$message .= ' Mensaje: ' . $_POST['message'];

$res = mail('juanhdezran@gmail.com', 'Nuevo Contacto', $message, $headers);

return $res;