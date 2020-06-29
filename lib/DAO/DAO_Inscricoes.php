<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Eventos.php');

class DAO_Inscricoes extends DAO_Eventos {
	public $tabela = 'inscricoes';
	
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