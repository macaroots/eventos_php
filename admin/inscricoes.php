<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Eventos.php');
$dao = new DAO_Eventos();
$eventos = $dao->lista();
?>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="../_js/jquery-3.4.1.min.js"></script>
	<script src="../_js/crud_inscricoes.js"></script>
</head>
<body>
	<?php include('menu.php'); ?>
	<form id="form" method="post" onSubmit="valida(this); return false;">
		<input type="reset" value="Novo" onClick="novo();" />
		<input type="hidden" value="insere" id="acao" name="acao" />
		<input type="hidden" value="0" name="id" id="id" />
		<div>
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" required="true"/>
		</div>
		
		<div>
			<label for="usuario">Usuário</label>
			<input type="text" name="usuario" id="usuario" required="true"/>
		</div>
		
		<div>
			<label for="senha">Senha</label>
			<input type="password" name="senha" id="senha" required="true"/>
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
	
	lista();
	</script>
</body>
</html>