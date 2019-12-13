<?php
if (isset($_GET['id'])) {
	include_once($_SERVER['DOCUMENT_ROOT'] . '/frigobar/admin/hospedes/DAO_Hospedes.php');
	$id = $_GET['id'];
	$dao = new DAO_Hospedes();
	$hospede = $dao->ver($id);
	$pagina = 'editar.php?id=' . $id;
}
else {
	$hospede = [
		'nome' => '',
		'quarto' => ''
	];
	$pagina = 'cadastrar.php';
}
?>
<html>
<body>
	<form method="post" action="<?php echo $pagina; ?>">
		<div>
			<label>Nome</label>
			<input type="text" name="nome" value="<?php echo $hospede['nome']; ?>" />
		</div>
		<div>
			<label>Quarto</label>
			<input type="number" name="quarto" value="<?php echo $hospede['quarto']; ?>" />
		</div>
		<input type="submit"/>
	</form>
</body>
</html>