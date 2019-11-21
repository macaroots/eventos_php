<?php
if(!isset($_SESSION)) {
	session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/DAOAbstrato.php');

class EventosDAO extends DAOAbstrato {
	public $tabela = 'eventos';

	function valida($evento) {
		$ok = true;
		$erros = [];

		if ($evento['nome'] == '') {
			$ok = false;
			$erros[] = '\n Nome não pode ser em branco';
		}
		return ["ok" => $ok, "erros" => $erros];
	}
	
	
	function listarProximos() {
		return $_SESSION[$this->tabela];
	}
	
	
	function listarUltimos() {
		return $_SESSION[$this->tabela];
	}
}