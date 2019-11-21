<?php
include('../checa_logado.php');

$id = $_GET['id'];
$submissao = $_SESSION['submissoes'][$id];

echo json_encode($submissao);