<?php
include_once($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/eventos_php/lib/DAO/DAO_Eventos.php');
$daoEventos = new DAO_Eventos();
$proximosEventos = $daoEventos->listaProximos();
$ultimosEventos = $daoEventos->listaUltimos();
?>
<html>
<head>
	<meta charset="utf-8"/>
</head>
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