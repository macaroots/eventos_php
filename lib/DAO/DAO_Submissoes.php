<?php
if(!isset($_SESSION)) {
	session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Abstrato.php');

class DAO_Submissoes extends DAO_Abstrato {
	public $tabela = 'submissoes';
	
	function valida($bean) {
		$ok = true;
		$erros = [];

		if ($bean['titulo'] == '') {
			$ok = false;
			$erros[] = 'Título não pode ser em branco';
		}
		if ($bean['resumo'] == '') {
			$ok = false;
			$erros[] = 'Resumo não pode ser em branco';
		}
		if (!$ok) {
			throw new Exception(join('\n', $erros));
		}
	}

	function listaPorEvento($id) {
		return $_SESSION[$this->tabela];
	}
}