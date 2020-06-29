<?php
if(!isset($_SESSION)) {
	session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Abstrato.php');

class DAO_Submissoes extends DAO_Abstrato {
	public $tabela = 'submissoes';
	
	function valida($submissao) {
		$ok = true;
		$erros = [];

		if ($submissao['titulo'] == '') {
			$ok = false;
			$erros[] = '\n Título não pode ser em branco';
		}
		return ["ok" => $ok, "erros" => $erros];
	}

	function listaPorEvento($id) {
		return $_SESSION[$this->tabela];
	}
}