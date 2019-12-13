<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/frigobar/admin/hospedes/DAO_Hospedes.php');
$hospede = [
	'nome' => $_POST['nome'],
	'quarto' => $_POST['quarto']
];

$dao = new DAO_Hospedes();
$dao->inserir($hospede);

header('location: listar.php');