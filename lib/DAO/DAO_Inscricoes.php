<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Abstrato.php');

class DAO_Inscricoes extends DAO_Abstrato {
	public $tabela = 'inscricoes';

	function valida($bean) {
		$ok = true;
		$erros = [];

		if ($bean['nome'] == '') {
			$ok = false;
			$erros[] = 'Nome não pode ser em branco';
		}
		if (!$ok) {
			throw new Exception(join('\n', $erros));
		}
	}
	
	function checaUsuario($nomeUsuario, $senha) {
		if ($senha == '123') {
			$usuario = [
				'id' => 1,
				'usuario' => $nomeUsuario,
				'nome' => ucfirst($nomeUsuario)
			];
		}
		else {
			$usuario = false;
		}
		return $usuario;
	}

}