<?php
if(!isset($_SESSION)) {
	session_start();
}

abstract class DAOAbstrato {
	public $tabela = 'eventos';

	abstract function valida($bean);

	function inserir($bean) {
		$validacao = $this->valida($bean);

		if ($validacao['ok']) {
			if (!isset($_SESSION[$this->tabela])) {
				$_SESSION[$this->tabela] = [];
			}
			
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

	function listar() {
		return $_SESSION[$this->tabela];
	}

	function editar($bean) {
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

	function apagar($id) {
		unset($_SESSION[$this->tabela][$id]);
		return ["ok" => true];
	}

	function ver($id) {
		$bean = $_SESSION[$this->tabela][$id];
		return $bean;
	}
}