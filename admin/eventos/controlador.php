<?php
include('../checa_logado.php');
include('modelo.php');

if (isset($_GET['acao'])) {
	$dao = new EventosDAO();
	$acao = $_GET['acao'];
	echo json_encode($dao->$acao());
}
