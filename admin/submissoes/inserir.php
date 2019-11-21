<?php
include('../checa_logado.php');

$acao = $_POST['acao'];

$submissao = [
	'id' => $_POST['id'],
	'titulo' => $_POST['titulo'],
	'resumo' => $_POST['resumo'],
	'usuarios' => $_POST['usuarios'],
	'evento' => $_POST['evento'],
	'tipo' => $_POST['tipo']
];

$ok = true;
$erros = '';

if ($submissao['titulo'] == '') {
	$ok = false;
	$erros .= '\n Título não pode ser em branco';
}

if ($ok) {
	if (!isset($_SESSION['submissoes'])) {
		$_SESSION['submissoes'] = [];
	}
	if ($acao == 'inserir') {
		$_SESSION['submissoes'][] = $submissao;
		$id = array_key_last($_SESSION['submissoes']);
		$_SESSION['submissoes'][$id]['id'] = $id;
	}
	else {
		$_SESSION['submissoes'][$submissao['id']] = $submissao;
	}
	
	echo '{"ok": true, "mensagem": "Inserido com sucesso!", "submissao": ' . json_encode($submissao) . '}';
}
else {
	echo '{"ok": false, "mensagem": "Erro ao inserir! ' . $erros . '"}';
}
