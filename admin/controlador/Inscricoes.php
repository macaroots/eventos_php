<?php
include('../checa_logado.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/controlador/ControladorAbstrato.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/InscricoesDAO.php');

class Controlador_Inscricoes extends ControladorAbstrato {
	function __construct() {
		$this->dao = new InscricoesDAO();
	}
	
	function getDadosForm() {
		$inscricao = [
			'id' => isset($_POST['id']) ? $_POST['id'] : 0,
			'nome' => $_POST['nome'],
			'usuario' => $_POST['usuario'],
			'senha' => $_POST['senha'],
			'email' => $_POST['email'],
			'evento' => $_POST['evento']
		];
		return $inscricao;
	}

}

if (isset($_REQUEST['acao'])) {
	$controlador = new Controlador_Inscricoes();
	$acao = $_REQUEST['acao'];
	echo json_encode($controlador->$acao());
}