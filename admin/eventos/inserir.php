<?php
include('../checa_logado.php');

$acao = $_POST['acao'];

$evento = [
	'id' => $_POST['id'],
	'nome' => $_POST['nome'],
	'data' => $_POST['data'],
	'descricao' => $_POST['descricao']
];

$ok = true;
$erros = '';

if ($evento['nome'] == '') {
	$ok = false;
	$erros .= '\n Nome não pode ser em branco';
}

if ($ok) {
	if (!isset($_SESSION['eventos'])) {
		$_SESSION['eventos'] = [];
	}
	if ($acao == 'inserir') {
		$_SESSION['eventos'][] = $evento;
		$id = array_key_last($_SESSION['eventos']);
		$_SESSION['eventos'][$id]['id'] = $id;
	}
	else {
		$_SESSION['eventos'][$evento['id']] = $evento;
	}
	
	echo '{"ok": true, "mensagem": "Inserido com sucesso!", "evento": ' . json_encode($evento) . '}';
}
else {
	echo '{"ok": false, "mensagem": "Erro ao inserir! ' . $erros . '"}';
}
