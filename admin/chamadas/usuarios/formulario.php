<?php
if (isset($_GET['id'])) {
	include_once('DAO_Usuarios.php');
	$id = $_GET['id'];
	$dao = new DAO_Usuarios();
	$usuario = $dao->ver($id);
	$pagina = 'editar.php?id=' . $id;
}
else {
	$usuario = [
		'nome' => '',
		'numero' => ''
	];
	$pagina = 'inserir.php';
}
?>
<html>
<body>
	<a href="../menu.php">menu</a>
	<form method="post" action="<?php echo $pagina; ?>">
		<div>
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>" />
		</div>
		<div>
			<label for="numero">Número</label>
			<input type="text" name="numero" id="numero" value="<?php echo $usuario['numero']; ?>" />
		</div>
		<input type="submit" />
	</form>
</body>
</html>