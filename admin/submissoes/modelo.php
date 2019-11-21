<?php
if(!isset($_SESSION)) {
	session_start();
}

class SubmissoesDAO {
	public $tabela = 'submissoes';
	function getDadosForm() {
		$submissao = [
			'id' => $_POST['id'],
			'titulo' => $_POST['titulo'],
			'resumo' => $_POST['resumo'],
			'usuarios' => $_POST['usuarios'],
			'evento' => $_POST['evento'],
			'tipo' => $_POST['tipo']
		];
		return $submissao;
	}

	function valida($submissao) {
		$ok = true;
		$erros = [];

		if ($submissao['titulo'] == '') {
			$ok = false;
			$erros[] = '\n Título não pode ser em branco';
		}
		return ["ok" => $ok, "erros" => $erros];
	}

	function inserir() {
		$submissao = $this->getDadosForm();
		$validacao = $this->valida($submissao);

		if ($validacao['ok']) {
			if (!isset($_SESSION[$this->tabela])) {
				$_SESSION[$this->tabela] = [];
			}
			$_SESSION[$this->tabela][] = $submissao;
			$id = array_key_last($_SESSION['submissoes']);
			$_SESSION[$this->tabela][$id]['id'] = $id;
			return [
				"ok" => true,
				"mensagem" => "Inserido com sucesso!",
				"submissao" => $submissao
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
		
		$submissao = $this->getDadosForm();
		$validacao = $this->valida($submissao);

		if ($validacao['ok']) {
			$_SESSION[$this->tabela][$submissao['id']] = $submissao;
			return [
				"ok" => true,
				"mensagem" => "Editado com sucesso!",
				"submissao" => $submissao
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
		$submissao = $_SESSION[$this->tabela][$id];
		return $submissao;
	}

	function listarPorEvento($id) {
		return $_SESSION[$this->tabela];
	}
}