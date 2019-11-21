<?php
include('../checa_logado.php');

$id = $_GET['id'];
$inscricao = $_SESSION['inscricoes'][$id];

echo json_encode($inscricao);