<html>
<head>
	<meta charset="utf-8"/>
	<script src="../_js/jquery-3.4.1.min.js"></script>
</head>
<body>
	<?php include('menu.php'); ?>
	<form id="form" method="post" onSubmit="valida(this); return false;">
		<input type="reset" value="Novo" onClick="novo();" />
		<input type="hidden" value="inserir" id="acao" name="acao" />
		<input type="hidden" value="0" name="id" id="id" />
		<div>
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" required="true"/>
		</div>
		
		<div>
			<label for="data">Data/hora</label>
			<input name="data" id="data" required="true" type="datetime-local" />
		</div>
		
		<div>
			<label for="descricao">Descrição</label>
			<textarea name="descricao" id="descricao"  required="true">
			</textarea>
		</div>
		
		<input type="submit"/>
	</form>
	
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Data/hora</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody id="lista">
		</tbody>
	</table>
	<script>
	function valida(form) {
		var ok = true;
		
		if (ok) {
			posta(form);
		}
	}
	
	function posta(form) {
		$.ajax({
			type: 'POST',
			url: 'eventos/inserir.php',
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
			url: 'eventos/listar.php',
			dataType: 'json',
			success: function (eventos) {
				var tbody = $('#lista');
				tbody.html('');
				for (var i in eventos) {
					var evento = eventos[i]
					var linha = $('<tr>').appendTo(tbody);
					linha.append('<td>' + evento.id + '</td>');
					linha.append('<td>' + evento.nome + '</td>');
					linha.append('<td>' + evento.data + '</td>');
					linha.append('<td><a href="javascript: edita(' + evento.id + ');">editar</a> <a href="javascript: apaga(' + evento.id + ');">apagar</a></td>');
				}
			}
		});
	}
	
	function edita(id) {
		$.get('eventos/ver.php?id=' + id, function (evento) {
			$('#id').val(evento.id);
			$('#nome').val(evento.nome);
			$('#data').val(evento.data);
			$('#descricao').val(evento.descricao);
			
			$('#acao').val('editar');
		}, 'json');
	}
	
	function apaga(id) {
		var ok = confirm('Deseja apagar #' + id + '?');
		if (ok) {
			$.get('eventos/apagar.php?id=' + id, function (resposta) {
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
	
	lista();
	</script>
</body>
</html>