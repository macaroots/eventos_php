<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/Controlador/Controlador_Abstrato.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Eventos.php');

class Controlador_Eventos extends Controlador_Abstrato {
	function __construct() {
		$this->dao = new DAO_Eventos();
	}
	
	function getDadosForm() {
		$evento = [
			'id' => $_POST['id'],
			'nome' => $_POST['nome'],
			'data' => $_POST['data'],
			'descricao' => $_POST['descricao']
		];

		return $evento;
	}

}

if (isset($_REQUEST['acao'])) {
	$controlador = new Controlador_Eventos();
	$acao = $_REQUEST['acao'];
	echo json_encode($controlador->$acao());
}