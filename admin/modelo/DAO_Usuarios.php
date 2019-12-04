<?php
if(!isset($_SESSION)) {
	session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/DAO_Abstrato.php');
class DAO_Usuarios extends DAO_Abstrato {
	public $tabela = 'usuarios';
	function valida($bean) {
		$ok = true;
		$erros = [];
		if ($bean['nome'] == '') {
			$ok = false;
			$erros[] = '\n Nome não pode ser em branco';
		}
		return ["ok" => $ok, "erros" => $erros];
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
