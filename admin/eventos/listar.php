<?php
include('../checa_logado.php');

echo json_encode($_SESSION['eventos']);
?>