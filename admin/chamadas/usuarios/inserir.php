<?php
include_once('DAO_Usuarios.php');

$usuario = [
	'nome' => $_POST['nome'],
	'numero' => $_POST['numero']
];

$dao = new DAO_Usuarios();
$dao->inserir($usuario);

header('location: listar.php');