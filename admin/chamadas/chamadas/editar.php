<?php
include_once('DAO_Usuarios.php');

$usuario = [
	'id' => $_GET['id'],
	'nome' => $_POST['nome'],
	'numero' => $_POST['numero']
];

$dao = new DAO_Usuarios();
$dao->editar($usuario);

header('location: listar.php');