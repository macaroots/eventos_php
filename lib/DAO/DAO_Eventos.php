<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/eventos_php/lib/DAO/DAO_Abstrato.php');

class DAO_Eventos extends DAO_Abstrato {
	public $tabela = 'eventos';

	function valida($bean) {
		$ok = true;
		$erros = [];

		if ($bean['nome'] == '') {
			$ok = false;
			$erros[] = 'Nome não pode ser em branco';
		}
		if ($bean['data'] == '') {
			$ok = false;
			$erros[] = 'Data não pode ser em branco';
		}
		if (!$ok) {
			throw new Exception(join('\n', $erros));
		}
	}
	
	
	function listaProximos() {
		return $_SESSION[$this->tabela];
	}
	
	
	function listaUltimos() {
		return $_SESSION[$this->tabela];
	}
}