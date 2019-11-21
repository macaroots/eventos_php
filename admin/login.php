<?php
session_start();

function checaUsuario($nomeUsuario, $senha) {
	if ($senha == '123') {
		$usuario = [
			'id' => 1,
			'usuario' => $nomeUsuario,
			'nome' => ucfirst($nomeUsuario)
		];
	}
	else {
		$usuario = false;
	}
	return $usuario;
}

$nomeUsuario = $_POST['usuario'];
$senha = $_POST['senha'];

$usuario = checaUsuario($nomeUsuario, $senha);
if ($usuario) {
	$_SESSION['usuario'] = $usuario;
	$resposta = true;
}
else {
	$resposta = false;
	session_destroy();
}

echo json_encode(["ok" => $resposta]);

