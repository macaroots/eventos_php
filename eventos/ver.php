<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Eventos.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/eventos/lib/DAO/DAO_Submissoes.php');
$daoEventos = new DAO_Eventos();
$daoSubmissoes = new DAO_Submissoes();

$id = $_GET['id'];
$evento = $daoEventos->getById($id);
$submissoes = $daoSubmissoes->listaPorEvento($evento['id']);
?>
<html>
<head>
	<meta charset="utf-8"/>
	<script src="../_js/jquery-3.4.1.min.js"></script>
	<script src="../_js/crud_inscricoes.js"></script>
</head>
<body>
	<h1><?php echo $evento['nome']; ?></h1>
	<div><?php echo $evento['data']; ?></div>
	<div><?php echo $evento['descricao']; ?></div>
	<div>
		<h2>Programação</h2>
<?php
foreach ($submissoes as $submissao) {
?>
		<div>
			<?php echo $submissao['titulo']; ?>			(<?php echo $submissao['usuarios']; ?>) - <?php echo $submissao['tipo']; ?>
		</div>
<?php
}
?>
	</div>
	<div id="inscricao">
		<h2>Inscreva-se:</h2>
		<form id="form" method="post" onSubmit="valida(this); return false;">
			<input type="hidden" name="evento" id="evento" value="<?php echo $evento['id']; ?>">
			<input type="hidden" name="acao" value="insere" required="true" />
			
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
			
			<input type="submit"/>
		</form>

	</div>
</body>
</html>