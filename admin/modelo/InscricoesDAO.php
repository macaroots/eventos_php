<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/EventosDAO.php');

class InscricoesDAO extends EventosDAO {
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