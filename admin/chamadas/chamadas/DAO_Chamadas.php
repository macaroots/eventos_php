<?php
class DAO_Chamadas {
	function conectar() {
		$conexao = new PDO('mysql:host=localhost;dbname=chamadas', 'root', '');
		$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conexao;
	}
	function inserir($chamada) {
		$conexao = $this->conectar();
var_dump($chamada);		
		$sql = 'INSERT INTO chamadas (id_de, id_para, data_inicio, data_fim) VALUES (:id_de, :id_para, :data_inicio, :data_fim)';
		$consulta = $conexao->prepare($sql);
		$consulta->execute($chamada);
		$id = $conexao->lastInsertId();
		
		return $id;
	}
	function editar($chamada) {
		$conexao = $this->conectar();
		
		$sql = 'UPDATE chamadas SET id_de=:id_de, id_para=:id_para, data_inicio=:data_inicio, data_fim=:data_fim WHERE id=:id';
		$consulta = $conexao->prepare($sql);
		$consulta->execute($chamada);
		
		return true;
	}
	function listar() {
		$conexao = $this->conectar();
		
		$sql = 'SELECT c.*, de.nome as de, para.nome as para FROM chamadas c JOIN usuarios de ON c.id_de=de.id JOIN usuarios para ON c.id_para=para.id';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		$linhas = $consulta->fetchAll(PDO::FETCH_ASSOC);
		
		return $linhas;
	}
	function ver($id) {
		$conexao = $this->conectar();
		
		$sql = 'SELECT * FROM chamadas WHERE id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute([$id]);
		$linha = $consulta->fetch(PDO::FETCH_ASSOC);
		
		return $linha;
	}
	function apagar($id) {
		$conexao = $this->conectar();
		
		$sql = 'DELETE FROM chamadas WHERE id=?';
		$consulta = $conexao->prepare($sql);
		$consulta->execute([$id]);
				
		return true;
	}
}