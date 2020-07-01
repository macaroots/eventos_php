<?php
function checaLogado() {
	if(!isset($_SESSION)) {
		session_start();
	}

	if (!isset($_SESSION['usuario'])) {
		// considerando que evento_php/ está no /var/www
		header('Location: /eventos_php/admin/index.html');
	}
}

checaLogado();