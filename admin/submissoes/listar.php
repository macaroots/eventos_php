<?php
include('../checa_logado.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Submissoes.php');
$dao = new DAO_Submissoes();

$submissoes = $dao->lista();

echo json_encode($submissoes);
?>