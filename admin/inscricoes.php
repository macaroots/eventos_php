<?php
include("eventos/modelo.php");
$dao = new EventosDAO();
$eventos = $dao->listar();
?>
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
			<label for="email">E-mail</label>
			<input name="email" id="email" type="email" required="true"/>
		</div>
		
		<div>
			<label for="evento">Evento</label>
			<select name="evento" id="evento" required="true">
<?php
foreach ($eventos as $evento) {
?>
				<option value="<?php echo $evento['id']; ?>"><?php echo $evento['nome']; ?></option>
<?php 
}
?>
			</select>
		</div>
		
		<input type="submit"/>
	</form>
	
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Evento</th>
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
			url: 'inscricoes/controlador.php?acao=inserir',
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
			url: 'inscricoes/controlador.php?acao=listar',
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
		$.get('inscricoes/controlador.php?acao=ver&id=' + id, function (inscricao) {
			$('#id').val(inscricao.id);
			$('#nome').val(inscricao.nome);
			$('#email').val(inscricao.email);
			$('#evento').val(inscricao.evento);
			
			$('#acao').val('editar');
		}, 'json');
	}
	
	function apaga(id) {
		var ok = confirm('Deseja apagar #' + id + '?');
		if (ok) {
			$.get('inscricoes/controlador.php?acao=apagar&id=' + id, function (resposta) {
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