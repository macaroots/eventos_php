<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/frigobar/admin/hospedes/DAO_Hospedes.php');
$dao = new DAO_Hospedes();
$hospedes = $dao->listar();
?>
<html>
<body>
	<table>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Quarto</th>
			<th>Ações</th>
		</tr>
<?php
foreach ($hospedes as $hospede) {
?>
		<tr>
			<td><?php echo $hospede['id']; ?></td>
			<td><?php echo $hospede['nome']; ?></td>
			<td><?php echo $hospede['quarto']; ?></td>
			<td>
				<a href="formulario.php?id=<?php echo $hospede['id']; ?>">editar</a>
				<a href="apagar.php?id=<?php echo $hospede['id']; ?>" onclick="return confirm('Tem certeza?');">apagar</a>
			</td>
		</tr>
<?php
}
?>
	</table>
</body>
</html>