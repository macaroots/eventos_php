<?php
include('../checa_logado.php');

$id = $_GET['id'];
unset($_SESSION['inscricoes'][$id]);
?>{"ok": true}