<?php
include_once('DAO_Usuarios.php');
$id = $_GET['id'];

$dao = new DAO_Usuarios();
$dao->apagar($id);

header('location: listar.php');