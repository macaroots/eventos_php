<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/eventos_php/admin/checa_logado.php');

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
		try {
			$bean = $this->getDadosForm();
			$id = $this->dao->insere($bean);
		
			return [
				"ok" => true,
				"mensagem" => "Inserido com sucesso!",
				"bean" => $bean
			];
		}
		catch (Exception $e) {
			return [
				"ok" => false,
				"mensagem" => "Erro ao inserir!",
				"erros" => $e->getMessage()
			];
		}
	}
	function edita() {
		try {
			$bean = $this->getDadosForm();
			$this->dao->edita($bean);
		
			return [
				"ok" => true,
				"mensagem" => "Editado com sucesso!",
				"bean" => $bean
			];
		}
		catch (Exception $e) {
			return [
				"ok" => false,
				"mensagem" => "Erro ao editar!",
				"erros" => $e
			];
		}
	}
	
	abstract function getDadosForm();


}