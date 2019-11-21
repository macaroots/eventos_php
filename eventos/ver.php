<?php
include_once('admin/eventos/modelo.php');
include_once('admin/submissoes/modelo.php');
$daoEventos = new EventosDAO();
$daoSubmissoes = new SubmissoesDAO();

$evento = $daoEventos->ver();
$submissoes = $daoSubmissoes->listarPorEvento($evento['id']);
?>
<html>
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
</body>
</html>