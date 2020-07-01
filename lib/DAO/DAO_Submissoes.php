<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/eventos_php/lib/DAO/DAO_Abstrato.php');

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