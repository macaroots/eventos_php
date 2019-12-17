<?php
include_once('DAO_Chamadas.php');

$chamada = [
	'id_de' => $_POST['id_de'],
	'id_para' => $_POST['id_para'],
	'data_inicio' => $_POST['data_inicio'],
	'data_fim' => $_POST['data_fim']
];

$dao = new DAO_Chamadas();
$dao->inserir($chamada);

header('location: listar.php');