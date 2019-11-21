<?php
include('../checa_logado.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/controlador/ControladorAbstrato.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/SubmissoesDAO.php');

class Controlador_Submissoes extends ControladorAbstrato {
	function __construct() {
		$this->dao = new SubmissoesDAO();
	}
	
	function getDadosForm() {
		$submissao = [
			'id' => $_POST['id'],
			'titulo' => $_POST['titulo'],
			'resumo' => $_POST['resumo'],
			'usuarios' => $_POST['usuarios'],
			'evento' => $_POST['evento'],
			'tipo' => $_POST['tipo']
		];
		return $submissao;
	}

}

if (isset($_REQUEST['acao'])) {
	$controlador = new Controlador_Submissoes();
	$acao = $_REQUEST['acao'];
	echo json_encode($controlador->$acao());
}