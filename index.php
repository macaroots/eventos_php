<?php
include_once('admin/eventos/modelo.php');
$daoEventos = new EventosDAO();
$proximosEventos = $daoEventos->listarProximos();
$ultimosEventos = $daoEventos->listarUltimos();
?>
<html>
<body>
	<h1>Eventos</h1>
	<h2>Próximos eventos</h2>
<?php
foreach ($proximosEventos as $evento) {
?>
	<div>
		<a href="eventos/ver.php?id=<?php echo $evento['id']; ?>"><?php echo $evento['nome']; ?> - <?php echo $evento['data']; ?></a>
	</div>
<?php
}
?>
	<h2>Últimos eventos</h2>
<?php
foreach ($ultimosEventos as $evento) {
?>
	<div>
		<a href="eventos/ver.php?id=<?php echo $evento['id']; ?>"><?php echo $evento['nome']; ?> - <?php echo $evento['data']; ?></a>
	</div>
<?php
}
?></body>
</html>