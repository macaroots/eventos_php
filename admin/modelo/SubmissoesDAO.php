<?php
if(!isset($_SESSION)) {
	session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/DAOAbstrato.php');

class SubmissoesDAO extends DAOAbstrato {
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

	function listarPorEvento($id) {
		return $_SESSION[$this->tabela];
	}
}