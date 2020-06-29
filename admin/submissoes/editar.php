<?php
include('../checa_logado.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Submissoes.php');
$dao = new DAO_Submissoes();

$submissao = [
	'id' => $_GET['id'],
	'titulo' => $_GET['titulo'],
	'resumo' => $_GET['resumo'],
	'usuarios' => $_GET['usuarios'],
	'evento' => $_GET['evento'],
	'tipo' => $_GET['tipo']
];

try {
	$dao->edita($submissao);
	
	echo '{"ok": true, "mensagem": "Editado com sucesso!", "submissao": ' . json_encode($submissao) . '}';
}
catch (Exception $e) {
	echo '{"ok": false, "mensagem": "Erro ao editar! ' . $e->getMessage() . '"}';
}
