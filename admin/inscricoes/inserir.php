<?php
include('../checa_logado.php');

$acao = $_POST['acao'];

$inscricao = [
	'id' => $_POST['id'],
	'nome' => $_POST['nome'],
	'email' => $_POST['email'],
	'evento' => $_POST['evento']
];

$ok = true;
$erros = '';

if ($inscricao['nome'] == '') {
	$ok = false;
	$erros .= '\n Nome não pode ser em branco';
}

if ($ok) {
	if (!isset($_SESSION['inscricoes'])) {
		$_SESSION['inscricoes'] = [];
	}
	if ($acao == 'inserir') {
		$_SESSION['inscricoes'][] = $inscricao;
		$id = array_key_last($_SESSION['inscricoes']);
		$_SESSION['inscricoes'][$id]['id'] = $id;
	}
	else {
		$_SESSION['inscricoes'][$inscricao['id']] = $inscricao;
	}
	
	echo '{"ok": true, "mensagem": "Inserido com sucesso!", "inscricao": ' . json_encode($inscricao) . '}';
}
else {
	echo '{"ok": false, "mensagem": "Erro ao inserir! ' . $erros . '"}';
}
