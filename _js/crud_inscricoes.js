var url = 'http://localhost/eventos/admin/controlador/Controlador_Inscricoes.php';

function valida(form) {
	var ok = true;
	
	if (ok) {
		posta(form);
	}
}

function posta(form) {
	$.ajax({
		type: 'POST',
		url: url,
		data: $(form).serialize(),
		dataType: 'json',
		success: function (resposta) {	
			if (resposta.ok) {
				alert(resposta.mensagem);
				lista();
			}
			else {
				alert(resposta.mensagem);
			}
		}
	});
}

function lista() {
	$.ajax({
		type: 'GET',
		url: url + '?acao=listar',
		dataType: 'json',
		success: function (inscricoes) {
			var tbody = $('#lista');
			tbody.html('');
			for (var i in inscricoes) {
				var inscricao = inscricoes[i]
				var linha = $('<tr>').appendTo(tbody);
				linha.append('<td>' + inscricao.id + '</td>');
				linha.append('<td>' + inscricao.nome + '</td>');
				linha.append('<td>' + inscricao.email + '</td>');
				linha.append('<td>' + inscricao.evento + '</td>');
				linha.append('<td><a href="javascript: edita(' + inscricao.id + ');">editar</a> <a href="javascript: apaga(' + inscricao.id + ');">apagar</a></td>');
			}
		}
	});
}

function edita(id) {
	$.get(url + '?acao=ver&id=' + id, function (inscricao) {
		$('#id').val(inscricao.id);
		$('#nome').val(inscricao.nome);
		$('#usuario').val(inscricao.usuario);
		$('#senha').val(inscricao.senha);
		$('#email').val(inscricao.email);
		$('#evento').val(inscricao.evento);
		
		$('#acao').val('editar');
	}, 'json');
}

function apaga(id) {
	var ok = confirm('Deseja apagar #' + id + '?');
	if (ok) {
		$.get(url + '?acao=apagar&id=' + id, function (resposta) {
			if (resposta.ok) {
				alert('Apagado com sucesso!');
				lista();
			}
			else {
				alert('Erro ao apagar!');
			}
		}, 'json');
	}
}

function novo() {
	$('#acao').val('inserir');
	$('#id').val(0);
}
