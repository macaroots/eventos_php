<?php
class DAO_Usuarios {
	function conectar() {
		$conexao = new PDO('mysql:host=localhost;dbname=chamadas', 'root', '');
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conexao;
	}
	function inserir($usuario) {
		$conexao = $this->conectar();
		
		$sql = 'INSERT INTO usuarios (nome, numero) VALUES (:nome, :numero)';
		$consulta = $conexao->prepare($sql);
		$consulta->execute($usuario);
		$id = $conexao->lastInsertId();
		
		return $id;
	}
	function editar($usuario) {
		$conexao = $this->conectar();
		
		$sql = 'UPDATE usuarios SET nome=:nome, numero=:numero WHERE id=:id';
		$consulta = $conexao->prepare($sql);
		$consulta->execute($usuario);
		
		return true;
	}
	function listar() {
		$conexao = $this->conectar();
		
		$sql = 'SELECT * FROM usuarios';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		$linhas = $consulta->fetchAll(PDO::FETCH_ASSOC);
		
		return $linhas;
	}
	function ver($id) {
		$conexao = $this->conectar();
		
		$sql = 'SELECT * FROM usuarios WHERE id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute([$id]);
		$linha = $consulta->fetch(PDO::FETCH_ASSOC);
		
		return $linha;
	}
	function apagar($id) {
		$conexao = $this->conectar();
		
		$sql = 'DELETE FROM usuarios WHERE id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute([$id]);
				
		return true;
	}
}