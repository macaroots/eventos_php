<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/EventosDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/admin/modelo/InscricoesDAO.php');

$daoEventos = new EventosDAO();
$daoInscricoes = new InscricoesDAO();
$eventos = $daoEventos->listar();
$inscricoes = $daoInscricoes->listar();
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
			<label for="titulo">Título</label>
			<input type="text" name="titulo" id="titulo" required="true"/>
		</div>
		
		<div>
			<label for="resumo">Resumo</label>
			<textarea name="resumo" id="resumo" required="true"></textarea>
		</div>
		
		<div>
			<label for="usuarios">Usuários</label>
			<select name="usuarios" id="usuarios" multiple="true" required="true">
<?php
foreach ($inscricoes as $inscricao) {
?>
				<option value="<?php echo $inscricao['id']; ?>"><?php echo $inscricao['nome']; ?></option>
<?php 
}
?>
			</select>
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
		
		<div>
			<label for="arquivo">Arquivo</label>
			<input type="file" name="arquivo" id="arquivo"/>
		</div>
		<div>
			<label for="trabalho">Trabalho</label>
			<input type="radio" value="trabalho" id="trabalho" name="tipo" required="true"/>
			<label for="palestra">Palestra</label>
			<input type="radio" value="palestra" id="palestra" name="tipo" required="true"/>
		</div>
		<input type="submit"/>
	</form>
	
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Evento</th>
				<th>Palestra/Trabalho</th>
				<th>Título</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody id="lista">
		</tbody>
	</table>
	<script>
	var url = 'http://localhost/eventos/admin/controlador/Submissoes.php';
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
			success: function (submissoes) {
				var tbody = $('#lista');
				tbody.html('');
				for (var i in submissoes) {
					var submissao = submissoes[i]
					var linha = $('<tr>').appendTo(tbody);
					linha.append('<td>' + submissao.id + '</td>');
					linha.append('<td>' + submissao.evento + '</td>');
					linha.append('<td>' + submissao.tipo + '</td>');
					linha.append('<td>' + submissao.titulo + '</td>');
					linha.append('<td><a href="javascript: edita(' + submissao.id + ');">editar</a> <a href="javascript: apaga(' + submissao.id + ');">apagar</a></td>');
				}
			}
		});
	}
	
	function edita(id) {
		$.get(url + '?acao=ver&id=' + id, function (submissao) {
			$('#id').val(submissao.id);
			$('#titulo').val(submissao.titulo);
			$('#resumo').val(submissao.resumo);
			$('#usuarios').val(submissao.usuarios);
			$('#evento').val(submissao.evento);
			$('#' + submissao.tipo).click();
			//$('#arquivo').val(submissao.arquivo);
			
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
	
	lista();
	</script>
</body>
</html>