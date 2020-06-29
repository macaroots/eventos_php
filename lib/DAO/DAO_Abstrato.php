<?php
if(!isset($_SESSION)) {
	session_start();
}

abstract class DAO_Abstrato {
	public $tabela;
	
	function __construct() {		
		if (!isset($_SESSION[$this->tabela])) {
			$_SESSION[$this->tabela] = [];
		}
	}

	abstract function valida($bean);

	function insere($bean) {
		$validacao = $this->valida($bean);

		if ($validacao['ok']) {
			
			$_SESSION[$this->tabela][] = $bean;
			$id = array_key_last($_SESSION[$this->tabela]);
			$_SESSION[$this->tabela][$id]['id'] = $id;
			
			return [
				"ok" => true,
				"mensagem" => "Inserido com sucesso!",
				"bean" => $bean
			];
		}
		else {
			return [
				"ok" => false,
				"mensagem" => "Erro ao inserir!",
				"erros" => $validacao['erros']
			];
		}
	}

	function lista() {
		return $_SESSION[$this->tabela];
	}

	function edita($bean) {
		$validacao = $this->valida($bean);

		if ($validacao['ok']) {
			$_SESSION[$this->tabela][$bean['id']] = $bean;
			return [
				"ok" => true,
				"mensagem" => "Editado com sucesso!",
				"bean" => $bean
			];
		}
		else {
			return [
				"ok" => false,
				"mensagem" => "Erro ao inserir!",
				"erros" => $validacao['erros']
			];
		}
				

	}

	function apaga($id) {
		unset($_SESSION[$this->tabela][$id]);
		return ["ok" => true];
	}

	function getById($id) {
		$bean = $_SESSION[$this->tabela][$id];
		return $bean;
	}
}