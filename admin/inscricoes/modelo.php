<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/eventos/modelo.php');

class InscricoesDAO extends EventosDAO {
	public $tabela = 'inscricoes';
	function getDadosForm() {
		$inscricao = [
			'id' => $_POST['id'],
			'nome' => $_POST['nome'],
			'email' => $_POST['email'],
			'evento' => $_POST['evento']
		];
		return $inscricao;
	}
}