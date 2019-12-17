<?php
include_once('DAO_Usuarios.php');
$dao = new DAO_Usuarios();
$usuarios = $dao->listar();
?>
<html>
<body>
	<a href="../menu.php">menu</a>
	<table>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Número</th>
			<th>Ações</th>
		</tr>
<?php
foreach ($usuarios as $usuario) {
?>
		<tr>
			<td><?php echo $usuario['id']; ?></td>
			<td><?php echo $usuario['nome']; ?></td>
			<td><?php echo $usuario['numero']; ?></td>
			<td>
				<a href="formulario.php?id=<?php echo $usuario['id']; ?>">editar</a>
				<a href="apagar.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza?');">apagar</a>
			</td>
		</tr>
<?php
}
?>
	</table>
</body>
</html>