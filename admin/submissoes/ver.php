<?php
include('../checa_logado.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Submissoes.php');
$dao = new DAO_Submissoes();

$id = $_GET['id'];
$submissao = $dao->getById($id)

echo json_encode($submissao);