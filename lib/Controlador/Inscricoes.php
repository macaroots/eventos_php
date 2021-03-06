<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/eventos_php/lib/Controlador/Controlador_Abstrato.php');
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/eventos_php/lib/DAO/DAO_Inscricoes.php');

class Controlador_Inscricoes extends Controlador_Abstrato {
	function __construct() {
		$this->dao = new DAO_Inscricoes();
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