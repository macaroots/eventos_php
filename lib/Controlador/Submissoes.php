<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/Controlador/Controlador_Abstrato.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Submissoes.php');

class Controlador_Submissoes extends Controlador_Abstrato {
	function __construct() {
		$this->dao = new DAO_Submissoes();
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