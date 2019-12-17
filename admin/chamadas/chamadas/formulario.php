<?php
include_once('../usuarios/DAO_Usuarios.php');
$daoUsuarios = new DAO_Usuarios();
$usuarios = $daoUsuarios->listar();

if (isset($_GET['id'])) {
	include_once('DAO_Chamadas.php');
	$id = $_GET['id'];
	$dao = new DAO_Chamadas();
	$chamada = $dao->ver($id);
	$pagina = 'editar.php?id=' . $id;
}
else {
	$chamada = [
		'id_de' => '',
		'id_para' => '',
		'data_inicio' => '',
		'data_fim' => ''
	];
	$pagina = 'inserir.php';
}
?>
<html>
<body>
	<a href="../menu.php">menu</a>
	<form method="post" action="<?php echo $pagina; ?>">
		<div>
			<label for="de">De</label>
			<select name="id_de" id="de">
<?php
foreach ($usuarios as $usuario) {
?>
				<option value="<?php echo $usuario['id']; ?>"<?php echo ($usuario['id'] == $chamada['id_de']) ? ' checked="true"' : ''; ?>><?php echo $usuario['nome']; ?></option>
<?php
}
?>
			</select>
		</div>
		<div>
			<label for="para">Para</label>
			<select name="id_para" id="para">
<?php
foreach ($usuarios as $usuario) {
?>
				<option value="<?php echo $usuario['id']; ?>"<?php echo ($usuario['id'] == $chamada['id_para']) ? ' checked="true"' : ''; ?>><?php echo $usuario['nome']; ?></option>
<?php
}
?>
			</select>
		</div>
		<div>
			<label for="data_inicio">Data/hora de início</label>
			<input type="datetime-local" name="data_inicio" id="data_inicio" value="<?php echo $chamada['data_inicio']; ?>" />
		</div>
		<div>
			<label for="data_fim">Data/hora de fim</label>
			<input type="datetime-local" name="data_fim" id="data_fim" value="<?php echo $chamada['data_fim']; ?>" />
		</div>
		<input type="submit" />
	</form>
</body>
</html>