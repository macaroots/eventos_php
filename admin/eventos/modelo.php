<?php
if(!isset($_SESSION)) {
	session_start();
}

class DAO_Eventos {
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

	function insere() {
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

	function lista() {
		return $_SESSION[$this->tabela];
	}

	function edita() {
		
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

	function apaga() {
		$id = $_GET['id'];
		unset($_SESSION[$this->tabela][$id]);
		return ["ok" => true];
	}

	function getById() {
		$id = $_GET['id'];
		$evento = $_SESSION[$this->tabela][$id];
		return $evento;
	}
	
	
	function listaProximos() {
		return $_SESSION[$this->tabela];
	}
	
	
	function listaUltimos() {
		return $_SESSION[$this->tabela];
	}
}