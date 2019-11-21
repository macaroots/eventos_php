<?php
function checaLogado() {
	if(!isset($_SESSION)) {
		session_start();
	}

	if (!isset($_SESSION['usuario'])) {
		header('Location: /eventos/admin/index.html');
	}
}

checaLogado();