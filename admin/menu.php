<?php
include('checa_logado.php');
?>
<h1>Bem-vindo, <?php echo $_SESSION['usuario']['nome']; ?>!</h1>
<a href="logout.php">Sair</a>
<nav>
	<ul>
		<li><a href="eventos.php">Eventos</a></li>
		<li><a href="inscricoes.php">Inscrições</a></li>
		<li><a href="submissoes.php">Submissões</a></li>
	</ul>
</nav>