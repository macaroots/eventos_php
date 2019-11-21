<?php
include_once('../checa_logado.php');

abstract class ControladorAbstrato {
	public $dao;
	
	function apagar() {
		$id = $_GET['id'];
		return $this->dao->apagar($id);
	}
	function listar() {
		return $this->dao->listar();
	}
	function ver() {
		$id = $_GET['id'];
		return $this->dao->ver($id);
	}
	function inserir() {
		$bean = $this->getDadosForm();
		return $this->dao->inserir($bean);
	}
	function editar() {
		$bean = $this->getDadosForm();
		return $this->dao->editar($bean);
	}
	
	abstract function getDadosForm();


}