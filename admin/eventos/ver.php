<?php
include('../checa_logado.php');

$id = $_GET['id'];
$evento = $_SESSION['eventos'][$id];

echo json_encode($evento);