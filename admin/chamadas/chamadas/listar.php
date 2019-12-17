<?php
include_once('DAO_Chamadas.php');
$dao = new DAO_Chamadas();
$chamadas = $dao->listar();
?>
<html>
<body>
	<a href="../menu.php">menu</a>
	<table>
		<tr>
			<th>Id</th>
			<th>De</th>
			<th>Para</th>
			<th>Data/hora início</th>
			<th>Data/hora fim</th>
			<th>Ações</th>
		</tr>
<?php
foreach ($chamadas as $chamada) {
?>
		<tr>
			<td><?php echo $chamada['id']; ?></td>
			<td><?php echo $chamada['de']; ?></td>
			<td><?php echo $chamada['para']; ?></td>
			<td><?php echo $chamada['data_inicio']; ?></td>
			<td><?php echo $chamada['data_fim']; ?></td>
			<td>
				<a href="formulario.php?id=<?php echo $chamada['id']; ?>">editar</a>
				<a href="apagar.php?id=<?php echo $chamada['id']; ?>" onclick="return confirm('Tem certeza?');">apagar</a>
			</td>
		</tr>
<?php
}
?>
	</table>
</body>
</html>