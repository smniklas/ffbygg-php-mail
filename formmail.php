<?php
$modtagere[0] = "nj@searchminds.se";
$mail_modtagere = implode(",", $modtagere);

$succes = "succes.htm";
$fejl = "fejl.htm";

$navn = sanitize($_POST['navn']);
$emailadresse = "From: " . sanitize($_POST['emailadresse']);
$emne = "Besked fra " . $navn . ": " . sanitize($_POST['emne']);
$besked = $_POST['besked'];

$mail_status = mail($mail_modtagere, $emne, $besked, $emailadresse);

if ($mail_status) {
header("Location: " . $succes);
} else {
header("Location: " . $fejl);
}

function sanitize($data) {
$safe_data = $data;

if ($pos = strpos($safe_data, "\n")) {
$safe_data = substr($safe_data, 0, $pos-1);
}
if ($pos = strpos($safe_data, "\r")) {
$safe_data = substr($safe_data, 0, $pos-1);
}
return $safe_data;
}
?>