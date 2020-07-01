<?php
if(!isset($_SESSION)) {
	session_start();
}
require_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/eventos_php/lib/DAO/DAO.php');

class DAO_Abstrato implements DAO {
	public $tabela = 'tabela';

	function __construct() {		
		if (!isset($_SESSION[$this->tabela])) {
			$_SESSION[$this->tabela] = [];
		}
	}

	function valida($bean) {
		// validação básica de exemplo
		if (empty($bean)) {
			throw new Exception('Não pode ser vazio!');
		}
	}

	function insere(&$bean) {
		$this->valida($bean);
		
		$id = $this->doInsere($bean);
		$bean['id'] = $id;
		return $id;
	}
	function doInsere($bean) {
		if (!isset($_SESSION[$this->tabela])) {
			$_SESSION[$this->tabela] = [];
		}
			
		$_SESSION[$this->tabela][] = $bean;
		$id = array_key_last($_SESSION[$this->tabela]);
		$_SESSION[$this->tabela][$id]['id'] = $id;
		
		return $id;
	}

	function lista() {
		return $_SESSION[$this->tabela];
	}

	function edita($bean) {
		$validacao = $this->valida($bean);
		
		$this->doEdita($bean);
	}
	
	function doEdita($bean) {
		$_SESSION[$this->tabela][$bean['id']] = $bean;		
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