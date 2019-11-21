<?php
if(!isset($_SESSION)) {
	session_start();
}

class EventosDAO {
	public $tabela = 'eventos';
	function getDadosForm() {
		$evento = [
			'id' => $_POST['id'],
			'nome' => $_POST['nome'],
			'data' => $_POST['data'],
			'descricao' => $_POST['descricao']
		];

		return $evento;
	}

	function valida($evento) {
		$ok = true;
		$erros = [];

		if ($evento['nome'] == '') {
			$ok = false;
			$erros[] = '\n Nome não pode ser em branco';
		}
		return ["ok" => $ok, "erros" => $erros];
	}

	function inserir() {
		$evento = $this->getDadosForm();
		$validacao = $this->valida($evento);

		if ($validacao['ok']) {
			if (!isset($_SESSION[$this->tabela])) {
				$_SESSION[$this->tabela] = [];
			}
			
			$_SESSION[$this->tabela][] = $evento;
			$id = array_key_last($_SESSION[$this->tabela]);
			$_SESSION[$this->tabela][$id]['id'] = $id;
			
			return [
				"ok" => true,
				"mensagem" => "Inserido com sucesso!",
				"objeto" => $evento
			];
		}
		else {
			return [
				"ok" => false,
				"mensagem" => "Erro ao inserir!",
				"erros" => $validacao['erros']
			];
		}
	}

	function listar() {
		return $_SESSION[$this->tabela];
	}

	function editar() {
		
		$evento = getDadosForm();
		$validacao = valida($evento);

		if ($validacao['ok']) {
			$_SESSION[$this->tabela][$evento['id']] = $evento;
			return [
				"ok" => true,
				"mensagem" => "Editado com sucesso!",
				"objeto" => $evento
			];
		}
		else {
			return [
				"ok" => false,
				"mensagem" => "Erro ao inserir!",
				"erros" => $validacao['erros']
			];
		}
				

	}

	function apagar() {
		$id = $_GET['id'];
		unset($_SESSION[$this->tabela][$id]);
		return ["ok" => true];
	}

	function ver() {
		$id = $_GET['id'];
		$evento = $_SESSION[$this->tabela][$id];
		return $evento;
	}
	
	
	function listarProximos() {
		return $_SESSION[$this->tabela];
	}
	
	
	function listarUltimos() {
		return $_SESSION[$this->tabela];
	}
}