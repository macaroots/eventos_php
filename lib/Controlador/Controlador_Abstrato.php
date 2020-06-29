<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/checa_logado.php');

abstract class Controlador_Abstrato {
	public $dao;
	
	function apaga() {
		$id = $_GET['id'];
		return $this->dao->apaga($id);
	}
	function lista() {
		return $this->dao->lista();
	}
	function getById() {
		$id = $_GET['id'];
		return $this->dao->getById($id);
	}
	function insere() {
		$bean = $this->getDadosForm();
		return $this->dao->insere($bean);
	}
	function edita() {
		$bean = $this->getDadosForm();
		return $this->dao->edita($bean);
	}
	
	abstract function getDadosForm();


}