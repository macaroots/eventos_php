<?php
include('../checa_logado.php');

$id = $_GET['id'];
unset($_SESSION['eventos'][$id]);
?>{"ok": true}