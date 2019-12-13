<?php
class DAO_Hospedes {
	function conectar() {
		$conexao = new PDO('mysql:host=localhost;dbname=frigobar', 'root', '');
		return $conexao;
	}
	function inserir($hospede) {
		$conexao = $this->conectar();
		
		$sql = 'INSERT INTO hospedes (nome, quarto) VALUES (:nome, :quarto)';
		$consulta = $conexao->prepare($sql);
		$consulta->execute($hospede);
		
		$id = $conexao->lastInsertId();
		
		return $id;
	}
	function editar($hospede) {
		$conexao = $this->conectar();
		
		$sql = 'UPDATE hospedes SET nome=:nome, quarto=:quarto WHERE id=:id';
		$consulta = $conexao->prepare($sql);
		$consulta->execute($hospede);
		
		return true;
	}
	function listar() {
		$conexao = $this->conectar();
		
		$sql = 'SELECT * FROM hospedes';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		$linhas = $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $linhas;
	}
	function ver($id) {
		$conexao = $this->conectar();
		
		$sql = 'SELECT * FROM hospedes WHERE id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute([$id]);
		$linha = $consulta->fetch(PDO::FETCH_ASSOC);
		return $linha;
	}
	function apagar($id) {
		$conexao = $this->conectar();
		
		$sql = 'DELETE FROM hospedes WHERE id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute([$id]);
		
		return true;
	}
}