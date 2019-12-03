<?php
session_start();


require_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/eventos/DAO_Inscricoes.php');

$dao = new DAO_Inscricoes();

$nomeUsuario = $_POST['usuario'];
$senha = $_POST['senha'];

$usuario = $dao->checaUsuario($nomeUsuario, $senha);
if ($usuario) {
	$_SESSION['usuario'] = $usuario;
	$resposta = true;
}
else {
	$resposta = false;
	session_destroy();
}

echo json_encode(["ok" => $resposta]);

