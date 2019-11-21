<?php
include('../checa_logado.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/controlador/ControladorAbstrato.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/EventosDAO.php');

class Controlador_Eventos extends ControladorAbstrato {
	function __construct() {
		$this->dao = new EventosDAO();
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