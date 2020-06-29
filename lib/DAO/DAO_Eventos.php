<?php
if(!isset($_SESSION)) {
	session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Abstrato.php');

class DAO_Eventos extends DAO_Abstrato {
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
	
	
	function listaProximos() {
		return $_SESSION[$this->tabela];
	}
	
	
	function listaUltimos() {
		return $_SESSION[$this->tabela];
	}
}